<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class CleanUpSpacesTest extends TestCase
{
    protected function setUp(): void
    {
        $this->cleanUpSpacesService = new StringService\CleanUpSpaces();
    }

    public function testCleanUpSpaces()
    {
        $string = 'hello world';
        $this->assertSame(
            $string,
            $this->cleanUpSpacesService->cleanUpSpaces($string)
        );

        $string = 'extra     spaces';
        $this->assertSame(
            'extra spaces',
            $this->cleanUpSpacesService->cleanUpSpaces($string)
        );

        $string = ' Testing     123   ';
        $this->assertSame(
            'Testing 123',
            $this->cleanUpSpacesService->cleanUpSpaces($string)
        );
    }
}
