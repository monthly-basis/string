<?php
namespace MonthlyBasis\StringTest\Model;

use MonthlyBasis\String\Model\Exception as StringException;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    protected function setUp(): void
    {
        $this->exception = new StringException('This is the message.');
    }

    public function test_getMessage()
    {
        $this->assertSame(
            'This is the message.',
            $this->exception->getMessage(),
        );
    }
}
