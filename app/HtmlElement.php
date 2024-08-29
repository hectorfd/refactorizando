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

        //? Lógica
        // Si el elemento tiene atributos:
        if (!empty($this->attributes)) {
            $htmlAttributes = '';
            foreach ($this->attributes as $name => $value) {
                if(is_numeric($name)){
                    $htmlAttributes .=' '.$value;
                }else{
                    $htmlAttributes .=' '. $name . '="' .htmlentities($value,ENT_QUOTES, 'UTF-8') . '"';//name="value"
                }

                

            }
            // Abrir la etiqueta con atributo
            $result = '<'.$this->name.$htmlAttributes.'>';
        }else{
            // Abrir la etiqueta sin atributos
            $result = '<'.$this->name.'>';
        }
        // Si el elemento es void
        if (in_array($this->name, ['br', 'hr', 'img', 'input', 'meta', 'link', 'base', 'col', 'embed', 'source', 'track', 'wbr', 'area', 'param', 'keygen', 'command'])) {
            return $result;
        }
        

        // imprimir el contenido
        if ($this->content !== null) {
            $result .=htmlentities($this->content, ENT_QUOTES,'UTF-8'); 
        }
        // cerrar la etiqueta 
        $result .= '</'.$this->name.'>';
        return $result;
        
    }

}