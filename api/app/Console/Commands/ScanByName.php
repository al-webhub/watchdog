<?php

namespace App\Console\Commands;

use App\Scan;
use Illuminate\Console\Command;
use App\Website;
use App\Helpers\Scanner;

class ScanByName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:url {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan and save by website name';

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
       $this->info('Working...'.$this->argument('url'));
       // check if given url exists anywhere
       $website = Website::where('url', $this->argument('url'))->get()->first();
       if (is_null($website)) {
           $this->info('Website not found in database!');
           return false;
       }
       $this->info('Found! Please wait. Scan in progress');
       $this->info('Scan process can take over 30 seconds!');

       $scan = new Scanner($this->argument('url'));
       $result = $scan->go();
       dd($result['mobile']);
       $this->info('Scan results'.$result['mobile']->getStatusCode(), '  -> '.$result['desktop']->getStatusCode());


    }
}
