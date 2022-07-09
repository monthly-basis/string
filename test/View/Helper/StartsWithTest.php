<?php
namespace MonthlyBasis\StringTest\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use MonthlyBasis\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
    protected function setUp(): void
    {
        $this->startsWithServiceMock = $this->createMock(
            StringService\StartsWith::class
        );

        $this->startsWithHelper = new StringHelper\StartsWith(
            $this->startsWithServiceMock
        );
    }

    public function test___invoke_serviceReturnsTrue_true()
    {
        $this->startsWithServiceMock
            ->expects($this->once())
            ->method('startsWith')
            ->with('needle')
            ->willReturn(true)
            ;

        $this->assertTrue(
            $this->startsWithHelper->__invoke('needle', 'haystack')
        );
    }

    public function test___invoke_serviceReturnsFalse_false()
    {
        $this->startsWithServiceMock
            ->expects($this->once())
            ->method('startsWith')
            ->with('needle')
            ->willReturn(false)
            ;

        $this->assertFalse(
            $this->startsWithHelper->__invoke('needle', 'haystack')
        );
    }
}
