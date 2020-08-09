<?php
namespace LeoGalleguillos\StringTest\Model\Service\Url;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class ToHtmlTest extends TestCase
{
    protected function setUp(): void
    {
        $this->escapeServiceMock = $this->createMock(
            StringService\Escape::class
        );
        $this->toHtmlService = new StringService\Url\ToHtml(
            $this->escapeServiceMock
        );
    }

    public function test_toHtml_localDomain_plainAHref()
    {
        $url = 'https://www.jiskha.com';
        $this->escapeServiceMock
            ->expects($this->once())
            ->method('escape')
            ->with($url)
            ->willReturn($url);
        $this->assertSame(
            '<a href="https://www.jiskha.com">https://www.jiskha.com</a>',
            $this->toHtmlService->toHtml($url)
        );
    }

    public function test_toHtml_externalDomain_aHrefWithAttributes()
    {
        $url = 'https://www.yahoo.com';
        $this->escapeServiceMock
            ->expects($this->once())
            ->method('escape')
            ->with($url)
            ->willReturn($url);
        $this->assertSame(
            '<a href="https://www.yahoo.com" target="_blank" rel="nofollow external noopener">https://www.yahoo.com</a>',
            $this->toHtmlService->toHtml($url)
        );
    }
}
