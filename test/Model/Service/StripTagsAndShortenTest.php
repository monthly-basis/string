<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class StripTagsAndShortenTest extends TestCase
{
    protected function setUp()
    {
        $this->stripTagsAndShortenService = new StringService\StripTagsAndShorten();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\StripTagsAndShorten::class,
            $this->stripTagsAndShortenService
        );
    }

    public function testGetUrls()
    {
        $string = 'hello world';
        $this->assertSame(
            'hello',
            $this->stripTagsAndShortenService->stripTagsAndShorten(
                $string,
                7
            )
        );
        $this->assertSame(
            'hello world',
            $this->stripTagsAndShortenService->stripTagsAndShorten(
                $string,
                11
            )
        );
    }
}
