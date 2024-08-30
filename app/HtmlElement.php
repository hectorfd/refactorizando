<?php
namespace App;

class HtmlElement {

    //* variables
    private $name;
    private $attributes;
    private $content;
    

    //? constructor
    public function __construct(String $name,array $attributes=[], $content = null){
        $this->name=$name;
        $this->attributes=$attributes;
        $this->content=$content;
        
    }
    //* método render
    public function render(){

        

        if ($this->isVoid()) {
            return $this->open();
        }
        $result = $this->open().$this->content().$this->close();

        return $result;
        
    }
    public function close(){
        return '</'.$this->name.'>';
    }
    public function content(){
        return htmlentities($this->content, ENT_QUOTES,'UTF-8'); 
    }
    public function isVoid(){
        return in_array($this->name, ['br', 'hr', 'img', 'input', 'meta', 'link', 'base', 'col', 'embed', 'source', 'track', 'wbr', 'area', 'param', 'keygen', 'command']);
    }
    public function open(){
        //? Lógica
        // Si el elemento tiene atributos:
        if (empty($this->attributes)) {
            // Abrir la etiqueta sin atributos
            return '<'.$this->name.'>';
        }
            // Abrir la etiqueta con atributo
            return '<'.$this->name.$this->attributes().'>';   
    }
    public function attributes(){
        return array_reduce(array_keys($this->attributes), function($result, $name){
            return $result .$this->renderAttributes($name);
        },'');
        
        // foreach ($this->attributes as $name => $value) {
        //     $htmlAttributes.=$this->renderAttributes($name, $value);
        // }
        // return $htmlAttributes;
    }
    protected function renderAttributes($name){
        if(is_numeric($name)){
            return ' '.$this->attributes[$name];
        }
        return ' '. $name . '="' .htmlentities($this->attributes[$name],ENT_QUOTES, 'UTF-8') . '"';//name="value"
    }

}