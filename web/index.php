<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 19:39
 */

define( 'DISPLAY_DEBUG', true );
define( 'SEND_ERRORS_TO', 'k.kosut@gmail.com' );

setlocale(LC_ALL, "cs_CZ.utf-8");

function load_classphp($directory) {
    if(is_dir($directory)) {
        $scan = scandir($directory);
        unset($scan[0], $scan[1]); //unset . and ..
        foreach($scan as $file) {
            if(is_dir($directory."/".$file)) {
                load_classphp($directory."/".$file);
            } else {
                if(strpos($file, '.class.php') !== false) {
                   //  echo $directory."/".$file."<br>";
                    /** @var TYPE_NAME $directory */
                    include_once($directory."/".$file);
                }
            }
        }
    }
}
load_classphp('./model');
// */

\core\core::$configFile = require_once 'config.php';
$parsedURL = \core\core::requestURL();
session_start();

if (isset($_POST)){
    $form = new \core\form($_POST);
}
if ($parsedURL[0] == 'admin'){
    $parsedURL[1] = (isset($parsedURL[1]))?$parsedURL[1]:'';
    if (class_exists('\admin\\'.$parsedURL[1]."page")){
        $class = '\admin\\'.$parsedURL[0]."page";
        unset($parsedURL[0]);
        new \admin\basepage();
        $page = new $class($parsedURL);
        die();
    } elseif($parsedURL[1] === ''){
        new \admin\basepage();
        new \admin\main();
        die();
    } else {
        echo "Error 404";
        die();
    }
}
if (class_exists('\page\\'.$parsedURL[0]."page")){
    $class = '\page\\'.$parsedURL[0]."page";
    unset($parsedURL[0]);
    new \page\basepage();
    $page = new $class($parsedURL);
} elseif($parsedURL[0] === ''){
    new \page\basepage();
    new \page\main();
} else {
    echo "Error 404";
   die();
}