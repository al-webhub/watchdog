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
}
