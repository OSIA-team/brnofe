<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 23:08
 */

namespace admin;

use admin\basepage;

class main extends basepage
{

    function __construct()
    {
        parent::getRenderer();
    }

    function renderDefault()
    {
        $this->data['nadpis'] = "Administrace!";
        $this->render();
    }

}