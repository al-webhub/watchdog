<?php

namespace App\Jobs;

use App\Logic\DataProcessor;
use App\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Logic\Scanner;

class ScanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $website;

    /**
     * Create a new job instance.
     *
     * @param Website $website
     */
    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $scan = (new Scanner($this->website->url))->go();
        if ($scan['mobile']['state'] === 'fulfilled' && $scan['desktop']['state'] === 'fulfilled') {
            $mobile = $scan['mobile']['value']->getBody()->getContents();
            $desktop = $scan['desktop']['value']->getBody()->getContents();
            $processor = new DataProcessor($mobile, $desktop);
            $processor->go($this->website->id);
        }
    }
}
