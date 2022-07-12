<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
    protected function setUp(): void
    {
        $this->startsWithService = new StringService\StartsWith();
    }

    public function test_startsWith()
    {
        $this->assertFalse(
            $this->startsWithService->startsWith(
                'hello world',
                'Hello',
            )
        );

        $this->assertTrue(
            $this->startsWithService->startsWith(
                'hello world',
                'hello',
            )
        );

        $this->assertTrue(
            $this->startsWithService->startsWith(
                'haystack and need are the same',
                'haystack and need are the same',
            )
        );

        $this->assertFalse(
            $this->startsWithService->startsWith(
                'needle',
                'needle is longer than haystack',
            )
        );

        $this->assertFalse(
            $this->startsWithService->startsWith(
                '',
                'test',
            )
        );

        $this->assertTrue(
            $this->startsWithService->startsWith(
                'hello world',
                '',
            )
        );
    }
}
