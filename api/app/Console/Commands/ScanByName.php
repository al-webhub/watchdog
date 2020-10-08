<?php

namespace App\Console\Commands;

use App\Scan;
use Illuminate\Console\Command;
use App\Website;
use App\Logic\Scanner;
use App\Logic\DataProcessor;


class ScanByName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:url {url} {--onlyscan}';

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
       if (!$this->option('onlyscan')) {
           $website = Website::where('url', $this->argument('url'))->get()->first();
           if (is_null($website)) {
               $this->info('Website not found in database!');
               return false;
           }
           $this->info('Found! Please wait. Scan in progress');
       }
       $this->info('Scan process can take over 30 seconds!');

       $scan = new Scanner($this->argument('url'));
       $result = $scan->go();
       // TODO proper error handling
       if ($result['mobile']['state'] === 'fulfilled') {
           $this->info('Mobile -> '.$result['mobile']['value']->getStatusCode(). ' -> '.$result['mobile']['value']->getReasonPhrase());
       } else {
           $this->info('FAILED Mobile');
       }
       if ($result['desktop']['state'] === 'fulfilled') {
            $this->info('Desktop -> '.$result['desktop']['value']->getStatusCode(). ' -> '.$result['desktop']['value']->getReasonPhrase());
       } else {
           $this->info('FAILED Desktop');
       }

       if ($result['mobile']['state'] === 'fulfilled' && $result['desktop']['state'] === 'fulfilled') {
            $mobile = $result['mobile']['value']->getBody()->getContents();
            $desktop = $result['desktop']['value']->getBody()->getContents();
            $processor = new DataProcessor($mobile, $desktop);
            if (isset($website->id)) {
                $processor->go($website->id);
            } else {
                $processor->go();
            }
       }
    }
}
