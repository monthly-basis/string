<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class ShortenTest extends TestCase
{
    protected function setUp()
    {
        $this->shortenService = new StringService\Shorten();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\Shorten::class,
            $this->shortenService
        );
    }

    public function testGetUrls()
    {
        $string = 'hello world';
        $this->assertSame(
            'hello',
            $this->shortenService->shorten(
                $string,
                7
            )
        );
        $this->assertSame(
            'hello world',
            $this->shortenService->shorten(
                $string,
                11
            )
        );

        $string = '   Lorem ipsum   dolor sit  amet, consectetur adipiscing elit. ';
        $this->assertSame(
            'Lorem ipsum',
            $this->shortenService->shorten(
                $string,
                11
            )
        );
        $this->assertSame(
            'Lorem ipsum dolor sit amet,',
            $this->shortenService->shorten(
                $string,
                32
            )
        );
    }
}
