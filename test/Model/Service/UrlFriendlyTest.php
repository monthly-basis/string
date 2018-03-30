<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service\UrlFriendly as UrlFriendly;
use PHPUnit\Framework\TestCase;

class UrlFriendlyTest extends TestCase
{
    protected function setUp()
    {
        $this->urlFriendlyService = new UrlFriendly();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(UrlFriendly::class, $this->urlFriendlyService);
    }

    public function testGetUrlFriendly()
    {
        $this->assertSame(
            'test',
            $this->urlFriendlyService->getUrlFriendly('test')
        );

        $this->assertSame(
            'aint',
            $this->urlFriendlyService->getUrlFriendly(' ain’t')
        );

        $this->assertSame(
            'cant',
            $this->urlFriendlyService->getUrlFriendly('can\'t ')
        );

        $string = ' surrounding spaces & special characters! ';
        $this->assertSame(
            'surrounding-spaces-special-characters',
            $this->urlFriendlyService->getUrlFriendly($string)
        );

        $string = '\'-!@$!@$';
        $this->assertSame(
            '-',
            $this->urlFriendlyService->getUrlFriendly($string)
        );
    }
}
