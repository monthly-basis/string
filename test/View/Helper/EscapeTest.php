<?php
namespace LeoGalleguillos\StringTest\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;

class EscapeTest extends TestCase
{
    protected function setUp(): void
    {
        $this->escapeService = new StringService\Escape();
        $this->escapeHelper = new StringHelper\Escape(
            $this->escapeService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringHelper\Escape::class,
            $this->escapeHelper
        );
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
