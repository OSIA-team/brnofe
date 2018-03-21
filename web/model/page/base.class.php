<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 22:07
 */

namespace page;
use core\core;
use database\database;


class basepage
{
    public $data = array();
    public $template = "default";


    public function getRenderer($method = NULL)
    {
        if (empty($method[1])) {
            $this->renderDefault();
        } else {
            $render = $method[1];
            $render = ucfirst($render);
            $render = "render".$render;
            unset($method[1]);
            if (!empty($method)){
                foreach ($method as $key => $value){
                    $options[] = $value;
                }
            } else {
                $options = NULL;
            }

            $this->$render($options);
        }
    }

    public function renderDefault(){
        echo "render default";
    }

    protected function render(){
        ob_start();
        $this->renderHead();
        $this->renderHeader();
        foreach ($this->data as $key => $value){
            $$key = $value;
        }
        // TODO: PUBLIC OR ADMIN?
        require_once "templates/public/".$this->template.".phtml";
        $this->renderFooter();
        ob_flush();
        ob_end_clean();
    }

    /**
     *  render <head>
     */
    private function renderHead(){
        // TODO: DOMYSLET
        // TODO: ADMIN/PUBLIC?
        $title = \core\core::getSiteinfo("title");
        $title = $title['value'];
        require_once "templates/public/head.phtml";
    }

    /**
     * render header of the page
     */
    private function renderHeader(){
        // TODO: Dynamik
        require_once "templates/public/header.phtml";
    }

    private function renderFooter(){

        require_once "templates/public/footer.phtml";
    }

}