<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 21.03.18
 * Time: 16:04
 */

namespace page;
use database\database;
use page\basepage;

class pagepage extends basepage {
    public function __construct($method)
    {
        parent::getRenderer($method);
    }

    public function renderDefault(){
        $this->data['nadpis'] = 'Clanky ke cteni';
        $this->render();
    }

    public function renderRead($options){
        $name = $options[0];
        $content = new database();
        $content = $content->get_row("SELECT content FROM page WHERE name = '{$name}'")['content'];

        $this->data['nadpis'] = $name;
        $this->template = 'page/read.phtml';
        $this->render();

    }

}