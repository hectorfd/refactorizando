<?php
namespace App;

class HtmlElement {

    //* variables
    private $name;
    private $attributes;
    private $content;
    
    //? constructor
    public function __construct(String $name, array $attributes = [], $content = null){
        $this->name = $name;
        $this->attributes = new HtmlAttributes($attributes);
        $this->content = $content;
    }

    //* método render
    public function render() {
        if ($this->isVoid()) {
            return $this->open();
        }
        $result = $this->open() . $this->content() . $this->close();
        return $result;
    }

    public function close() {
        return '</' . $this->name . '>';
    }

    public function content() {
        
        if ($this->content instanceof HtmlElement) {
            return $this->content->render();
        }
        
        if (is_string($this->content) && $this->isHtml($this->content)) {
            return $this->content;
        }
        return htmlentities($this->content, ENT_QUOTES, 'UTF-8');
    }

    public function isVoid() {
        return in_array($this->name, [
            'br', 'hr', 'img', 'input', 'meta', 'link', 'base', 'col', 'embed', 'source',
            'track', 'wbr', 'area', 'param', 'keygen', 'command'
        ]);
    }

    public function open() {
        if (empty($this->attributes)) {
            return '<' . $this->name . '>';
        }
        return '<' . $this->name . $this->attributes->renderizando() . '>';   
    }

    public function attributes() {
        return $this->attributes->renderizando();
    }

    public function hasAttributes() {
        return !empty($this->attributes->attributes);
    }

    private function isHtml($string) {
        return preg_match("/<[^<]+>/", $string, $m) != 0;
    }
}
