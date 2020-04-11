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

    public static function getAllEditableTags($filename, $search = '')
    {
        $html = self::getHtml($filename);
        $id = 1;
        $p  = self::getTag($html, 'p','Text',1, $search);
        $id = $id + count($p);
        $h1 = self::getTag($html, 'h1', 'Headline', $id, $search);
        $id = $id + count($h1);
        $h2 = self::getTag($html, 'h2', 'Headline', $id, $search);
        $id = $id + count($h2);
        $h3 = self::getTag($html, 'h3', 'Headline', $id, $search);
        $id = $id + count($h3);
        $h4 = self::getTag($html, 'h4', 'Headline', $id, $search);
        $id = $id + count($h4);
        $h5 = self::getTag($html, 'h5', 'Headline', $id, $search);
        $id = $id + count($h5);
        $h6 = self::getTag($html, 'h6', 'Headline', $id, $search);
        $id = $id + count($h6);
        $a  = self::getTag($html, 'a', 'link', $id, $search);
        $id = $id + count($a);
        $button = self::getTag($html, 'button', 'button', $id, $search);
        $id = $id + count($button);
        $span = self::getTag($html, 'span', 'Text', $id, $search);
        $id = $id + count($span);
        $label = self::getTag($html, 'label', 'Label', $id, $search);

        $result = array_merge($p, $h1, $h2, $h3, $h4, $h5, $h6, $a, $button, $span, $label);
        return $result;
    }

    public static function getTag($html, $tag, $type, $id = 0, $search)
    {
        $text = self::parseHtml($html, $tag);
        return self::makeObject($text, $type, $search, $id);
    }


    private static function parseHtml($html, $needle): array
    {
        $text = [];
        foreach($html->find($needle) as $element) {
            $text[] = $element->innertext;
        }
        return $text;
    }

    private static function makeObject($data, $type, $search, $id = 0)
    {
        $result = [];
        $total = count($data);
        for ($i = 0; $i < $total; $i++) {
            $data[$i] = self::filterSearch($data[$i], $search);
            if ($data[$i] === false) {
                continue;
            }
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

    public static function filterSearch(string $data, $search) {
        if (strlen($search) >= 3) {
            if (stripos($data, $search) !== false) {
                return $data;
            }
            return false;
        }
        return $data;
    }
}
