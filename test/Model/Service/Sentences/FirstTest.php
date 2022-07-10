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

    public function test_getFirstSentence_sentences_firstSentence()
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

    public function test_getFirstSentence_emptyArray_emptyString()
    {
        $this->shortenServiceMock
            ->expects($this->once())
            ->method('shorten')
            ->with('')
            ->willReturn('')
            ;
        $this->sentencesServiceMock
            ->expects($this->once())
            ->method('getSentences')
            ->with('')
            ->willReturn([])
            ;

        $this->assertSame(
            '',
            $this->firstService->getFirstSentence('')
        );
    }
}
