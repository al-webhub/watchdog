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
        $scan->ttfb_desktop = $desktop['ttfb'];
        $scan->tbt_desktop  = $desktop['tbt'];
        $scan->tbw_desktop  = $desktop['tbw'];


        $scan->score_mobile = $mobile['score'];
        $scan->cls_mobile = $mobile['cls'];
        $scan->fcp_mobile = $mobile['fcp'];
        $scan->tti_mobile = $mobile['tti'];
        $scan->si_mobile = $mobile['si'];
        $scan->ttfb_mobile = $mobile['ttfb'];
        $scan->tbt_mobile  = $mobile['tbt'];
        $scan->tbw_mobile  = $mobile['tbw'];

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
            'tbt'   => $data['lighthouseResult']['audits']['metrics']['details']['items'][0]['totalBlockingTime'],
            'ttfb'  => (int)$data['lighthouseResult']['audits']['server-response-time']['numericValue'],
            'tbw'   => (int)$data['lighthouseResult']['audits']['total-byte-weight']['numericValue']
        ];
        return $values;
    }

}
