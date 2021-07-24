<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Exception as StringException;
use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class RandomTest extends TestCase
{
    protected function setUp(): void
    {
        $this->randomService = new StringService\Random();
    }

    public function test_getRandomString_invalidLength_throwsException()
    {
        try {
            $this->randomService->getRandomString(0.9);
            $this->fail();
        } catch (StringException $stringException) {
            $this->assertSame(
                'Length must be greater than 0.',
                $stringException->getMessage(),
            );
        }

        try {
            $this->randomService->getRandomString(0);
            $this->fail();
        } catch (StringException $stringException) {
            $this->assertSame(
                'Length must be greater than 0.',
                $stringException->getMessage(),
            );
        }

        try {
            $this->randomService->getRandomString(-1);
            $this->fail();
        } catch (StringException $stringException) {
            $this->assertSame(
                'Length must be greater than 0.',
                $stringException->getMessage(),
            );
        }
    }

    public function test_getRandomString_variousLengths_randomStringWithCorrectLength()
    {
        $this->assertSame(
            1,
            strlen($this->randomService->getRandomString(1))
        );
        $this->assertSame(
            2,
            strlen($this->randomService->getRandomString(2))
        );
        $this->assertSame(
            3,
            strlen($this->randomService->getRandomString(3))
        );
        $this->assertSame(
            10,
            strlen($this->randomService->getRandomString(10))
        );
        $this->assertSame(
            10,
            strlen($this->randomService->getRandomString(10.3))
        );
        $this->assertSame(
            11,
            strlen($this->randomService->getRandomString(11))
        );
        $this->assertSame(
            11,
            strlen($this->randomService->getRandomString(11.7))
        );
        $this->assertSame(
            256,
            strlen($this->randomService->getRandomString(256))
        );
        $this->assertSame(
            257,
            strlen($this->randomService->getRandomString(257))
        );
    }
}
