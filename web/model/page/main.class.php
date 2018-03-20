<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 23:08
 */

namespace page;
use page\basepage;

class main extends basepage{

    function __construct(){
        parent::getRenderer();
    }

    function renderDefault(){
        echo 'main page default';
    }

}