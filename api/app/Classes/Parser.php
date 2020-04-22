<?php


namespace App\Classes;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Sunra\PhpSimple\HtmlDomParser;
use App\Classes\Files;

class Parser
{
    public static function getHtml($filename)
    {
        $file = Files::getFile($filename);
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

    public static function getImages($filename): array
    {
        $html = Files::getFile($filename);
        $imagesArray = self::parseImage($html);
        return self::makeImageObject($imagesArray);
    }

    public static function getTag($html, $tag, $type, $id = 0, $search = ''): array
    {
        $data = self::parseHtml($html, $tag);;
        return self::makeObject($data, $type, $search, $id);
    }

    public static function EditHtml($search, $replace, $html, $nth = 0)
    {
        $found = preg_match_all('#'.$search.'#', $html, $matches, PREG_OFFSET_CAPTURE);
        if (false !== $found && $found > $nth) {
            return substr_replace($html, $replace, $matches[0][$nth][1], strlen($search));
        }
        return $html;
    }

    private static function parseImage($html)
    {
        $horror = '/<img(?:\\s[^<>]*?)?\\bsrc\\s*=\\s*(?|"([^"]*)"|\'([^\']*)\'|([^<>\'"\\s]*))[^<>]*>/i';
        preg_match_all($horror, $html, $images);
        return $images;
    }

    private static function parseHtml($html, $needle): array
    {
        $parsedData = [];
        if ($html) {
            foreach($html->find($needle) as $element) {
                $parsedData[] = $element->innertext;
            }
        }
        return $parsedData;
    }

    private static function makeImageObject($data, $index = 1)
    {
        $result = [];
        if (is_array($data[$index]) && count($data[$index]) > 0) {
            foreach ($data[$index] as $key => $image) {
                $name = explode('/', $image);
                $object = new stdClass();
                $object->id = $key;
                $object->name = end($name);
                $object->path = $image;
                $result[] = $object;
            }
        }
        return $result;
    }

    private static function makeObject($data, $type, $search, $id = 0): array
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

    private static function filterSearch(string $data, $search)
    {
        if (strlen($search) >= 3) {
            if (stripos($data, $search) !== false) {
                return $data;
            }
            return false;
        }
        return $data;
    }
}
