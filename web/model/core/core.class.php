<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 19:40
 */

namespace core;
use database\database;
class core{
    static $rootdir;
    static $mode;
    static $admin;
    static $configFile;

    static function debugLog($message, $backtrace = NULL){
        $backtrace = ($backtrace == NULL )?"":debug_backtrace();
        $log     =  "Site: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL;
        $log    .=  ($backtrace != NULL)? "Called from:".PHP_EOL.print_r($backtrace, true).PHP_EOL:"";
        $log    .=  (is_array($message))?print_r($message, true).PHP_EOL:$message.PHP_EOL;
        $log    .=  "-------------------------".PHP_EOL;
        if(!file_put_contents('tmp/log_Debug.txt', $log, FILE_APPEND)){
            echo "<pre>Cannot save DebugFile, check permissions or if folder exists!</pre>";
        }
    }

    static function setMode(){

    }

    static function getMode(){

    }

    /**
     * @return array
     * get database info from connfig file
     */
    static function getDatabase(){
        $mode = self::$configFile['mode']();
        return self::$configFile['database'][$mode];
    }

    /**
     * @return array
     */
    static function requestURL(){
        $mode       = self::$configFile['mode']();
        $rootURL    = self::$configFile['dir'][$mode];
        $requestURL = str_replace($rootURL, "", $_SERVER['REQUEST_URI']);
       // $requestURL = substr($rootURL, 0, strpos($rootURL, "/"));
        $parsedURL  = parse_url($requestURL);
        $parsedURL  = explode("/", $parsedURL['path']);
        return $parsedURL;
    }

    /**
     * @param null $get
     * @return array|bool
     * TODO: poresite $get
     */
    static function getSiteinfo($get = NULL){
        $database = new database();
        $result = $database->get_row("SELECT value FROM siteinfo WHERE name = '{$get}'");
        return ($result)?$result:FALSE;
    }

    static function urlToAssets(){
    return $parsedURL = \core\core::requestURL();

    }
}