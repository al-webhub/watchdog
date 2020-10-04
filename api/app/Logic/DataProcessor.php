<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.10.20
 * Time: 15:42
 */

namespace App\Logic;
use App\Scan;

class DataProcessor
{

    private $mobile, $desktop;

    public function __construct($mobile, $desktop)
    {
        $this->mobile  = json_decode($mobile, true);
        $this->desktop = json_decode($desktop, true);
    }

    public function go($website_id = null)
    {
        $mobile = $this->prepare('mobile');
        $desktop = $this->prepare('desktop');
        if (!$website_id) {
            return ['Desktop' => $desktop, 'Mobile' => $mobile];
        }
        $scan = new Scan();
        $scan->website_id = $website_id;
        $scan->score_desktop = $desktop['score'];
        $scan->cls_desktop = $desktop['cls'];
        $scan->fcp_desktop = $desktop['fcp'];
        $scan->tti_desktop = $desktop['tti'];
        $scan->si_desktop = $desktop['si'];
        $scan->fcpu_idle_desktop = $desktop['fcpu'];
        $scan->ttfb_desktop = $desktop['ttfb'];

        $scan->score_mobile = $mobile['score'];
        $scan->cls_mobile = $mobile['cls'];
        $scan->fcp_mobile = $mobile['fcp'];
        $scan->tti_mobile = $mobile['tti'];
        $scan->si_mobile = $mobile['si'];
        $scan->fcpu_idle_mobile = $mobile['fcpu'];
        $scan->ttfb_mobile = $mobile['ttfb'];

        $scan->save();
        return true;
    }

    private function prepare($type)
    {
        switch ($type) {
            case 'mobile':
                $data = $this->mobile;
                break;
            case 'desktop':
                $data = $this->desktop;
                break;
        }

        $values = [
            'score' => $data['lighthouseResult']['categories']['performance']['score'] * 100,
            'fcp'   => $data['lighthouseResult']['audits']['metrics']['details']['items'][0]['firstContentfulPaint'],
            'cls'   => $data['lighthouseResult']['audits']['metrics']['details']['items'][0]['cumulativeLayoutShift'],
            'tti'   => $data['lighthouseResult']['audits']['metrics']['details']['items'][0]['interactive'],
            'si'    => $data['lighthouseResult']['audits']['metrics']['details']['items'][0]['speedIndex'],
            'fcpu' => $data['lighthouseResult']['audits']['metrics']['details']['items'][0]['firstCPUIdle'],
            'ttfb'  => (int)$data['lighthouseResult']['audits']['server-response-time']['numericValue']
        ];
        return $values;
    }

}
