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
            ->method('getFirstSentence')
            ->with('first sentence. second sentence.')
            ->willReturn('first sentence.')
            ;

        $this->assertSame(
            'first sentence.',
            $this->firstHelper->__invoke('first sentence. second sentence.')
        );
    }
}
