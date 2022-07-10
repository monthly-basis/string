<?php
namespace MonthlyBasis\StringTest\Model\Service\Sentences;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    protected function setUp(): void
    {
        $this->sentencesServiceMock = $this->createMock(
            StringService\Sentences::class
        );
        $this->shortenServiceMock = $this->createMock(
            StringService\Shorten::class
        );

        $this->firstService = new StringService\Sentences\First(
            $this->sentencesServiceMock,
            $this->shortenServiceMock,
        );
    }

    public function test_getFirstSentence()
    {
        $this->shortenServiceMock
            ->expects($this->once())
            ->method('shorten')
            ->with('string')
            ->willReturn('shortened string')
            ;
        $this->sentencesServiceMock
            ->expects($this->once())
            ->method('getSentences')
            ->with('shortened string')
            ->willReturn(['first sentence', 'second sentence'])
            ;

        $this->assertSame(
            'first sentence',
            $this->firstService->getFirstSentence('string')
        );
    }
}
