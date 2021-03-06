<?php
/**
 * Created by PhpStorm.
 * User: James Pont
 * Date: 03.07.2016
 * Time: 9:26
 */

namespace App;


class View  implements \Countable{


    protected $data = [];

    public function  __set($name, $value) {

        $this->data[$name] = $value;
    }

    function __get($name) {

        return $this->data[$name];
    }
    public function render($template){

        ob_start();

        foreach ($this->data as $prop => $value){
            $$prop = $value;
        }

        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @param $template string Путь к шаблону
     */
    public function display($template){

        echo $this->render($template);
    }

    public function count() {
        return count($this->data);
    }
}