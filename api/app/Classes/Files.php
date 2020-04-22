<?php


namespace App\Classes;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class Files
{
    public static function getFile($filename)
    {
        try {
            return Storage::disk('pages')->get($filename);
        } catch (FileNotFoundException $e) {
            return response()->json(['message' => 'Requested file not found!'], 404);
        }
    }

    public static function ReplaceFileContent($filename, $content)
    {
        try {
            Storage::disk('pages')->put($filename, $content);
            return true;
        } catch (FileNotFoundException $e) {
            return response()->json(['message' => 'Requested file not found!'], 404);
        }
    }

    public static function getLastModifiedDate($filename)
    {
        try {
            $lastmodified = Storage::disk('pages')->lastModified($filename);
            return Carbon::createFromTimestamp($lastmodified, 'Europe/Kiev')->toDayDateTimeString();
        } catch (FileNotFoundException $e) {
            return response()->json(['message' => 'Requested file not found!'], 404);
        }
    }
}
