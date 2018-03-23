<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 22:45
 */


namespace page;
use page\basepage;

class clanekpage extends basepage {
    public function __construct($method)
    {
        parent::getRenderer($method);
    }

    public function renderDefault(){
        $this->data['nadpis'] = 'Clanky ke cteni';
        $this->render();
    }

    public function renderRead($options){
        echo "Clanek -> Cist";

    }

} // */