<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Topup;
use Illuminate\Console\Command;

class GenerateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:data';

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
        Topup::factory()->count(200000)->create();
        
        $this->info('Sample data generated successfully!');
    }
}
