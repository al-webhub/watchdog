<?php


namespace Landingly\Utils;


class Logger
{
    public static function write()
    {
        if (!func_num_args()) {
            return; # Аргументы не переданы
        }

        $folder = 'Logs/';


        if (!file_exists($folder)) {
            mkdir($folder);
            chmod($folder, 0777);
        }

        $log_name = $folder . date("Y-m-d") . '.log'; // Раскидываем по дате
        $f = fopen($log_name, "a");
        fwrite($f, '['.date("Y-m-d H:i:s").'] ');
        foreach (func_get_args() as $arg) {
            if (is_bool($arg)) {
                $s = $arg ? 'TRUE' : 'FALSE';
            } elseif (is_array($arg) || is_object($arg)) {
                $s = print_r($arg, true);
            } else {
                $s = $arg;
            }
            fwrite($f, $s.' '); # вывод аргументов разделяется пробелом
        }
        fwrite($f, "\n");
        fclose($f);

    }
}
