<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 21:51
 */

namespace core;

use core\core;

class form
{
    private $data = array();
    private $forms = array(
        'addKategorie' => 'addKategorie',
        'edit_jidlo' => 'editJidlo',
        'edit_kategorie' => 'editKategorie',
        'pridat_jidlo' => 'pridatJidlo',
        'upload_img' => 'uploadImgJidlo',
        'obj-status' => 'objStatus'
    );
}