<?php

namespace App\Console\Commands;

use App\Website;
use Illuminate\Console\Command;
use App\Jobs\ScanJob;

class createScanJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:scans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create scan jobs';

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
        $this->info('...');
        $websites = Website::where('active', 1)->get();
        foreach ($websites as $website) {
            ScanJob::dispatch($website);
        }
        $this->info('Done!');
    }
}
