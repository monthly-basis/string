<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class StripTagsAndShortenTest extends TestCase
{
    protected function setUp(): void
    {
        $this->shortenService = new StringService\Shorten();

        $this->stripTagsAndShortenService = new StringService\StripTagsAndShorten(
            $this->shortenService
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

        $this->assertSame(
            'hel',
            $this->stripTagsAndShortenService->stripTagsAndShorten(
                $string,
                3
            )
        );
    }
}
