<?php
namespace LeoGalleguillos\StringTest\View\Helper;

use LeoGalleguillos\String\View\Helper\Escape as EscapeHelper;
use PHPUnit\Framework\TestCase;

class EscapeTest extends TestCase
{
    protected function setUp()
    {
        $this->escapeHelper = new EscapeHelper();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(EscapeHelper::class, $this->escapeHelper);
    }

    public function testInvoke()
    {
        $this->assertSame(
            'test',
            $this->escapeHelper->__invoke('test')
        );

        $string = '<html &>';
        $this->assertSame(
            '&lt;html &amp;&gt;',
            $this->escapeHelper->__invoke($string)
        );

        $string = '">attempt injection after attribute';
        $this->assertSame(
            '&quot;&gt;attempt injection after attribute',
            $this->escapeHelper->__invoke($string)
        );
    }
}
