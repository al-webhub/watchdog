<?php


namespace App\Logic;

use Carbon\Carbon;
use function Symfony\Component\String\b;

class Helper
{
    public static function sendResponse($data, $responseCode = 200)
    {
        return response()->json($data, $responseCode);
    }

    public static function sendMessage($message, $responseCode = 200)
    {
        return response()->json(['message' => $message], $responseCode);
    }

    public static function formatGraphOutput($rows, $date_format = '')
    {
        $data = [];
        foreach ($rows as $date => $scan) {
            $data['labels'][]  = (string)self::getFormattedDate($date, $date_format);
            $data['desktop'][] = (int)$scan->avg('score_desktop');
            $data['mobile'][]  = (int)$scan->avg('score_mobile');
            $data['fcp_mobile'][]  = (int)$scan->avg('fcp_mobile');
            $data['fcp_desktop'][] = (int)$scan->avg('fcp_desktop');
            $data['tti_mobile'][]  = (int)$scan->avg('tti_mobile');
            $data['tti_desktop'][] = (int)$scan->avg('tti_desktop');
            $data['si_mobile'][]   = (int)$scan->avg('si_mobile');
            $data['si_desktop'][]  = (int)$scan->avg('si_desktop');
            $data['tbt_mobile'][]   = (int)$scan->avg('tbt_mobile');
            $data['tbt_desktop'][]  = (int)$scan->avg('tbt_mobile');
            $data['ttfb_mobile'][]  = (int)$scan->avg('ttfb_mobile');
            $data['ttfb_desktop'][] = (int)$scan->avg('ttfb_desktop');
            $data['cls_mobile'][]  = round($scan->avg('cls_mobile'), 2);
            $data['cls_desktop'][] = round($scan->avg('cls_desktop'), 2);
            $data['tbw_mobile'][] = (int)$scan->avg('tbw_mobile');
            $data['tbw_desktop'][] = (int)$scan->avg('tbw_desktop');
        }
        return $data;
    }

    public static function getFormattedDate($date, $format)
    {
        switch ($format) {
            case "":
            case "H":
            case "d.m":
                return $date;
            break;
            case "W-Y":
                $date = explode('-', $date);
                $time = Carbon::now();
                $time->setISODate($date[1], $date[0]);
                return $time->startOfWeek()->format('d.m').'-'.$time->endOfWeek()->format('d.m');
                break;
        }
    }
}
