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

    public function test_getFirstSentence_customMaxLength_firstTwoSentences()
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
            ->willReturn(['First sentence.', 'Second sentence.', 'Third sentence.'])
            ;

        $this->assertSame(
            'First sentence. Second sentence.',
            $this->firstService->getFirstSentences('string', 10, 35)
        );
    }

    public function test_getFirstSentence_preciseCustomMaxLength_firstTwoSentences()
    {
        $this->shortenServiceMock
            ->expects($this->once())
            ->method('shorten')
            ->with('string')
            ->willReturn('First sentence. Second sentence.')
            ;
        $this->sentencesServiceMock
            ->expects($this->once())
            ->method('getSentences')
            ->with('First sentence. Second sentence.')
            ->willReturn(['First sentence.', 'Second sentence.'])
            ;

        $this->assertSame(
            'First sentence. Second sentence.',
            $this->firstService->getFirstSentences('string', 10, 32)
        );
    }

    public function test_getFirstSentence_preciseCustomMaxLength_firstSentence()
    {
        $this->shortenServiceMock
            ->expects($this->once())
            ->method('shorten')
            ->with('First sentence. Second sentence is too long.')
            ->willReturn('First sentence. Second sentence is too')
            ;
        $this->sentencesServiceMock
            ->expects($this->once())
            ->method('getSentences')
            ->with('First sentence. Second sentence is too')
            ->willReturn(['First sentence.', 'Second sentence is too'])
            ;

        $this->assertSame(
            'First sentence.',
            $this->firstService->getFirstSentences(
                'First sentence. Second sentence is too long.',
                10,
                32
            )
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
            $this->firstService->getFirstSentences('')
        );
    }
}
