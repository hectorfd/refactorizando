<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\HtmlElement;

class HtmlElementTest extends TestCase{

    //* primer test autor: @hectorfd
    public function testGeneratesHtml()
    {
        $element = new HtmlElement('p',[], 'Contenido');
        $this->assertSame(
            '<p>Contenido</p>', $element->render()
        );
    }
    //* segundo test autor: @hectorfd
    public function testGeneratesHtmlElement()
    {
        $element = new HtmlElement('p',['id'=>'párrafo'], 'Contenido');
        $this->assertSame(
            '<p id="p&aacute;rrafo">Contenido</p>', $element->render()
        );
    }

    //* tercer test autor: @hectorfd
    public function testGeneratesHtmlElementTag()
    {
        $element = new HtmlElement('img',['src'=>'../public/img/dog.jpg','height'=>200],);
        $this ->assertSame(
            '<img src="../public/img/dog.jpg" height="200">',$element->render()
        );
    }

    //* cuarto test autor: @hectorfd
    public function testGeneratesHtmlElementInputs()
    {
        $element = new HtmlElement('input',['required'],);
        $this ->assertSame(
            '<input required>',$element->render()
        );
    }

    

}