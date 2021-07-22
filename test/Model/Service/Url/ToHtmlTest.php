<?php
namespace MonthlyBasis\StringTest\Model\Service\Url;

use MonthlyBasis\String\Model\Service as StringService;
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

    public function test_toHtml_invalidUrl_unmodifiedString()
    {
        $url = 'https://@';

        $this->escapeServiceMock
            ->expects($this->exactly(0))
            ->method('escape')
            ;

        $this->assertSame(
            $url,
            $this->toHtmlService->toHtml($url)
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

    public function test_toHtml_googleDomainUrl1_simplifiedAHref()
    {
        $url = 'https://www.google.com/search?q=how+to+write+a+good+thesis+sentence&ie=utf-8&oe=utf-8&aq=t&rls=org.mozilla:en-US:official&client=firefox-a';
        $this->escapeServiceMock
            ->expects($this->once())
            ->method('escape')
            ->with($url)
            ->willReturn($url);
        $this->assertSame(
            '<a href="https://www.google.com/search?q=how+to+write+a+good+thesis+sentence" target="_blank" rel="nofollow external noopener">https://www.google.com/search?q=how+to+write+a+good+thesis+sentence</a>',
            $this->toHtmlService->toHtml($url)
        );
    }

    public function test_toHtml_googleDomainUrl2_simplifiedAHref()
    {
        $url = 'https://www.google.com/search?q=outcome+of+the+1914+Battle+of+Tannenberg&ie=UTF-8&oe=UTF-8&hl=en-us&client=safari';
        $this->escapeServiceMock
            ->expects($this->once())
            ->method('escape')
            ->with($url)
            ->willReturn($url);
        $this->assertSame(
            '<a href="https://www.google.com/search?q=outcome+of+the+1914+Battle+of+Tannenberg" target="_blank" rel="nofollow external noopener">https://www.google.com/search?q=outcome+of+the+1914+Battle+of+Tannenberg</a>',
            $this->toHtmlService->toHtml($url)
        );
    }
}
