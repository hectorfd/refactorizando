<?php
use App\HtmlElement;

require '../vendor/autoload.php';
//creamos una nueva instancia de HtmlElement

//* 1. ejemplo simple párrafo
$element = new HtmlElement('p',[], 'Contenido');
echo $element->open().'Chicharrones'.$element->close();

echo $element->render();



//* 2. ejemplo con elementos de HTML
$element = new HtmlElement('p',['id'=>'párrafo'], 'Contenido');
echo $element->render();

//* 3. ejemplo sin etiqueta para cerrar como img
$element = new HtmlElement('img',['src'=>'../public/img/dog.jpg','height'=>200],);
echo $element->render();

//* 4. ejemplo etiquetas de entrada
$element = new HtmlElement('input',['required'],);
echo $element->render();