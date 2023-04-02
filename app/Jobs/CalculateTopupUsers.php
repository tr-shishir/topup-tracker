<?php

namespace App\Jobs;

use DB;
use Carbon\Carbon;
use App\Models\Topup;
use App\Models\TopTopupUser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CalculateTopupUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $topup_users = Topup::whereDate('created_at', Carbon::yesterday())
            ->select('user_id', DB::raw('count(*) as count'))
            ->selectRaw('SUM(amount) as total_amount')
            ->groupBy('user_id')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        TopTopupUser::truncate();
        
        foreach ($topup_users as $topup_user) {
            TopTopupUser::create([
                'user_id' => $topup_user->user_id,
                'count' => $topup_user->count,
                'total_amount' => $topup_user->total_amount,
            ]);
        }
    }
}
