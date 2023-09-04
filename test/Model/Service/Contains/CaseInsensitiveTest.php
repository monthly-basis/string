<?php
namespace MonthlyBasis\StringTest\Model\Service\Contains;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class CaseInsensitiveTest extends TestCase
{
    protected function setUp(): void
    {
        $this->caseInsensitiveService = new StringService\Contains\CaseInsensitive();
    }

    public function test_caseInsensitive()
    {
        $this->assertTrue(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-WORLD',
                '',
            )
        );
        $this->assertTrue(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-world',
                'hello-world',
            )
        );
        $this->assertTrue(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-world',
                'HEL',
            )
        );
        $this->assertTrue(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-woRLD',
                'rld',
            )
        );
        $this->assertTrue(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-WORLD',
                'o-W',
            )
        );
        $this->assertFalse(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-world',
                'ABC',
            )
        );
        $this->assertFalse(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-world',
                'ó',
            )
        );
        $this->assertFalse(
            $this->caseInsensitiveService->caseInsensitive(
                'hello-world',
                'hello-world-again',
            )
        );
    }
}
