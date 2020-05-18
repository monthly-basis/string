<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class UrlsTest extends TestCase
{
    protected function setUp(): void
    {
        $this->startsWithService = new StringService\StartsWith();
        $this->urlsService = new StringService\Urls(
            $this->startsWithService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\Urls::class,
            $this->urlsService
        );
    }

    public function testGetUrls()
    {
        $this->assertSame(
            [],
            $this->urlsService->getUrls('')
        );

$string = <<<STRING
Check out these websites:

    https://www.google.com/
    https://www.yahoo.com/path/to/file.html

And also these:

    reddit.com/r/random
    https://wikipedia.org/

Hope that helps!
STRING;

        $urls = [
            'https://www.google.com/',
            'https://www.yahoo.com/path/to/file.html',
            'https://wikipedia.org/',
        ];
        $this->assertSame(
            $urls,
            $this->urlsService->getUrls($string)
        );
    }
}
