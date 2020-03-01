<?php


namespace Landingly\Utils;


class Helper
{
    public static function dd(...$va)
    {
        echo "<pre>";
        foreach ($var as &$v) {
            var_dump($v);
        }
        die;
    }
}
