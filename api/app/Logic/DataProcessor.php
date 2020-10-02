<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.10.20
 * Time: 15:42
 */

namespace App\Logic;


class DataProcessor
{

    private $mobile, $desktop;

    public function __construct($mobile, $desktop)
    {
        $this->mobile  = json_decode($mobile, true);
        $this->desktop = json_decode($desktop, true);
    }

    public function go()
    {
        $mobile = $this->prepare('mobile');

        $desktop = $this->prepare('desktop');

    }

    private function prepare($type)
    {
        switch ($type) {
            case "mobile":
                $data = $this->mobile;
                break;
            case "desktop":
                $data = $this->desktop;
                break;
        }
        $values = [
            'score_mobile' => '',
            'fcp_mobile'   => $data['lighthouseResult']['audits']['metrics']['details']['items']['firstContentfulPaint'],
            'tti_mobile'   => $data['lighthouseResult']['audits']['metrics']['details']['items']['interactive'],
            'si_mobile'    => $data['lighthouseResult']['audits']['metrics']['details']['items']['speedIndex'],
            'fcpu_idle_mobile' => $data['lighthouseResult']['audits']['metrics']['details']['items']['firstCPUIdle'],
            'ttfb_mobile'  => $data['lighthouseResult']['audits']['server-response-time']['numericValue']
        ];
    }
}