<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\HtmlElement;

class HtmlElementTest extends TestCase
{
    //* Primer test autor: @hectorfd
    public function testGeneratesHtml()
    {
        $element = new HtmlElement('p', [], 'Contenido');
        $this->assertSame(
            '<p>Contenido</p>',
            $element->render()
        );
    }

    //* Segundo test autor: @hectorfd
    public function testGeneratesHtmlElement()
    {
        $element = new HtmlElement('p', ['id' => 'párrafo'], 'Contenido');
        $this->assertSame(
            '<p id="p&aacute;rrafo">Contenido</p>',
            $element->render()
        );
    }

    //* Tercer test autor: @hectorfd
    public function testGeneratesHtmlElementTag()
    {
        $element = new HtmlElement('img', ['src' => '../public/img/dog.jpg', 'height' => 200],);
        $this->assertSame(
            '<img src="../public/img/dog.jpg" height="200">',
            $element->render()
        );
    }

    //* Cuarto test autor: @hectorfd
    public function testGeneratesHtmlElementInputs()
    {
        $element = new HtmlElement('input', ['required'],);
        $this->assertSame(
            '<input required>',
            $element->render()
        );
    }

    //* Quinto test autor: @hectorfd
    public function testCheckElementVoid()
    {
        $this->assertFalse((new HtmlElement('p'))->isVoid());
        $this->assertTrue((new HtmlElement('img'))->isVoid());
    }

    //* Sexto test autor: @hectorfd
    public function testGenerateAttributes()
    {
        $element = new HtmlElement('span', ['class' => 'a_span', 'id' => 'the_span']);
        $this->assertSame(' class="a_span" id="the_span"', $element->attributes());
    }
    //* Séptimo test autor: @hectorfd
    public function testGenerateHtmlElementWithBooleanAttributes()
    {
        $element = new HtmlElement('input', ['required', 'disabled']);
        $this->assertSame(
            '<input required disabled>',
            $element->render()
        );
    }

    //* Octavo test autor: @hectorfd
    public function testGenerateNestedHtmlElements()
    {
        $childElement = new HtmlElement('span', [], 'Texto dentro del span');
        $parentElement = new HtmlElement('div', ['class' => 'container'], $childElement->render());
        
        $this->assertSame(
            '<div class="container"><span>Texto dentro del span</span></div>',
            $parentElement->render()
        );
    }
  
}
