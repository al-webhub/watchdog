<?php
require __DIR__ . '/vendor/autoload.php';
use Landingly\Router\Router;
use Landingly\Utils\Helper;
use Landingly\Utils\Logger;

switch ($_REQUEST['type']) {
    case "post":
        switch ($_REQUEST['method']) {
            case "test":
                Logger::write($_REQUEST);
                break;
        }
        break;
    case "get":
        switch ($_REQUEST['method']) {
            case "test":
                $test = file_get_contents('https://jsonplaceholder.typicode.com/todos/1');
                echo $test;
                break;
        }
        break;
}
