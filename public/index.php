<?php
require '../vendor/autoload.php';
//creamos una nueva instancia de HtmlElement

//* 1. ejemplo simple párrafo
//$element = new \User\Refactoring\HtmlElement('p',[], 'Contenido');
//echo $element->render();

//* 2. ejemplo con elementos de HTML
//$element = new \User\Refactoring\HtmlElement('p',['id'=>'párrafo'], 'Contenido');
//echo $element->render();

//* 3. ejemplo sin etiqueta para cerrar como img
//$element = new \User\Refactoring\HtmlElement('img',['src'=>'../public/img/dog.jpg','height'=>200],);
//echo $element->render();

//* 4. ejemplo etiquetas de entrada
$element = new \App\HtmlElement('input',['required'],);
echo $element->render();