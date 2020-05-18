<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class ToHtmlTest extends TestCase
{
    protected function setUp(): void
    {
        $this->replaceBadWordsServiceMock = $this->createMock(
            StringService\ReplaceBadwords::class
        );

        $this->toHtmlService = new StringService\ToHtml(
            new StringService\Escape(),
            $this->replaceBadWordsServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\ToHtml::class,
            $this->toHtmlService
        );
    }

    public function testToHtml()
    {
        $this->replaceBadWordsServiceMock
             ->method('replaceBadWords')
             ->willReturn('hello world');
        $string = 'hello world';
        $this->assertSame(
            'hello world',
            $this->toHtmlService->toHtml($string)
        );

        $string = "\n\n   hello world\t\t   \t\n\n";
        $this->assertSame(
            'hello world',
            $this->toHtmlService->toHtml($string)
        );
    }
}
