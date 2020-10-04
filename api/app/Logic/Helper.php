<?php


namespace App\Logic;

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

    public static function formatGraphOutput($rows)
    {
        foreach ($rows as $date => $scan) {
            $data['labels'][]  = (string)$date;
            $data['desktop'][] = (int)$scan->avg('score_desktop');
            $data['mobile'][]  = (int)$scan->avg('score_mobile');
            $data['fcp_mobile'][]  = (int)$scan->avg('fcp_mobile');
            $data['fcp_desktop'][] = (int)$scan->avg('fcp_desktop');
            $data['tti_mobile'][]  = (int)$scan->avg('tti_mobile');
            $data['tti_desktop'][] = (int)$scan->avg('tti_desktop');
            $data['si_mobile'][]   = (int)$scan->avg('si_mobile');
            $data['si_desktop'][]  = (int)$scan->avg('si_desktop');
            $data['fcpu_idle_mobile'][]  = (int)$scan->avg('fcpu_idle_mobile');
            $data['fcpu_idle_desktop'][] = (int)$scan->avg('fcpu_idle_desktop');
            $data['ttfb_mobile'][]  = (int)$scan->avg('ttfb_mobile');
            $data['ttfb_desktop'][] = (int)$scan->avg('ttfb_desktop');
        }

        return $data;
    }
}
