<?php


namespace Landingly\Utils;


class Helper
{
    /**
     * Variables debug
     * @param mixed ...$var
     */
    public static function dd(...$var)
    {
        echo "<pre>";
        foreach ($var as &$v) {
            var_dump($v);
        }
        die;
    }

    /**
     * Format filesize from bytes to Kb, Mb, Gb , Tb
     *
     * @param $bytes
     * @param $precision
     * @return string
     */
    public static function FormatBytes($bytes, $precision)
    {
        $base = log($bytes, 1024);
        $suffixes = ['', 'Kb', 'Mb', 'Gb', "Tb"];
        $result = round(pow(1024, $base - floor($base)), $precision) . ' '. $suffixes[floor($base)];
        return $result;
    }
}
