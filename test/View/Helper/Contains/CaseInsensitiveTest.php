<?php

declare(strict_types=1);

namespace MonthlyBasis\StringTest\View\Helper\Contains;

use MonthlyBasis\String\Model\Service as StringService;
use MonthlyBasis\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;

class CaseInsensitiveTest extends TestCase
{
    protected function setUp(): void
    {
        $this->caseInsensitiveServiceMock = $this->createMock(
            StringService\Contains\CaseInsensitive::class
        );

        $this->caseInsensitiveHelper = new StringHelper\Contains\CaseInsensitive(
            $this->caseInsensitiveServiceMock
        );
    }

    public function test___invoke_serviceReturnsFalse_false()
    {
        $this->caseInsensitiveServiceMock
             ->expects($this->once())
             ->method('caseInsensitive')
             ->with('arbitrary string 1', 'arbitrary string 2')
             ->willReturn(false);

        $this->assertFalse(
            $this->caseInsensitiveHelper->__invoke(
                'arbitrary string 1',
                'arbitrary string 2'
            )
        );
    }

    public function test___invoke_serviceReturnsTrue_true()
    {
        $this->caseInsensitiveServiceMock
             ->expects($this->once())
             ->method('caseInsensitive')
             ->with('arbitrary string 1', 'arbitrary string 2')
             ->willReturn(true);

        $this->assertTrue(
            $this->caseInsensitiveHelper->__invoke(
                'arbitrary string 1',
                'arbitrary string 2'
            )
        );
    }
}
