<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Factory\View\Helper\Escape as EscapeHelperFactory;
use PHPUnit\Framework\TestCase;

class EscapeTest extends TestCase
{
    protected function setUp()
    {
        $this->escapeHelperFactory = new EscapeHelperFactory();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(EscapeHelperFactory::class, $this->escapeHelperFactory);
    }
}
