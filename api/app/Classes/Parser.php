<?php


namespace App\Classes;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Sunra\PhpSimple\HtmlDomParser;

class Parser
{
    public static function getHtml($filename)
    {
        try {
            $file = Storage::disk('pages')->get($filename);
        } catch (FileNotFoundException $e) {
            return response()->json(['message' => "Requested file not found!"], 404);
        }
        return HtmlDomParser::str_get_html($file);
    }


    public static function getAllEditableTags($filename)
    {
        $html = self::getHtml($filename);
        $text = self::getP($html);
        return $text;
    }

    public static function getP($html)
    {
        $text = [];
        $text = self::parseHtml($html, 'p');
        $result = self::makeObject($text,'Text', 0);
        return $result;
    }

    private static function parseHtml($html, $needle)
    {
        $text = [];
        foreach($html->find($needle) as $element) {
            $text[] = $element->innertext;
        }
        return $text;
    }

    private static function makeObject($data, $type, $id = 0)
    {
        for ($i = 0; $i < count($data); $i++) {
            if (mb_strlen(trim($data[$i]), 'utf-8') > 1) {
                $object = new stdClass();
                $object->id = $id;
                $object->type = $type;
                $object->value = trim($data[$i]);
                $id++;
                $result[] = $object;
            }
        }
        return $result;
    }
}
