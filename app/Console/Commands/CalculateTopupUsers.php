<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Topup;
use App\Models\TopTopupUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CalculateTopupUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:topup-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start = Carbon::yesterday()->startOfDay();
        $end = Carbon::yesterday()->endOfDay();
        
        $top_users = Topup::select('user_id', DB::raw('count(user_id) as count'))
            ->whereBetween('created_at', [$start, $end])
            ->selectRaw('SUM(amount) as total_amount')
            ->groupBy('user_id')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        TopTopupUser::truncate();

        foreach ($top_users as $user) {
            TopTopupUser::updateOrCreate(
                ['user_id' => $user->user_id],
                [
                    'count' => $user->count,
                    'total_amount' => $user->total_amount,
                ]
            );
        }

        $this->info('Top 10 users with the most top-ups calculated successfully!');
    }
}
