<?php
namespace MonthlyBasis\StringTest\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use MonthlyBasis\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    protected function setUp(): void
    {
        $this->firstServiceMock = $this->createMock(
            StringService\Sentences\First::class
        );

        $this->firstHelper = new StringHelper\Sentences\First(
            $this->firstServiceMock
        );
    }

    public function test___invoke()
    {
        $this->firstServiceMock
            ->expects($this->once())
            ->method('getFirstSentences')
            ->with('First sentence. Second sentence. Third sentence.', 35)
            ->willReturn('First sentence. Second sentence.')
            ;

        $this->assertSame(
            'First sentence. Second sentence.',
            $this->firstHelper->__invoke('First sentence. Second sentence. Third sentence.', 35)
        );
    }
}
