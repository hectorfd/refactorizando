<?php
namespace App;
class HtmlAttributes{
    public $attributes;
    public function __construct($attributes = []){
        $this->attributes = $attributes;
    }

    protected function renderAttributes($name){
        if(is_numeric($name)){
            return ' '.$this->attributes[$name];
        }
        return ' '. $name . '="' .htmlentities($this->attributes[$name],ENT_QUOTES, 'UTF-8') . '"';//name="value"
    }

    public function renderizando(){
        return array_reduce(array_keys($this->attributes), function($result, $name){
            return $result .$this->renderAttributes($name);
        },'');

    }
}