<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    protected function setUp(): void
    {
        $this->urlService = new StringService\Url();
    }

    public function test_isUrl()
    {
        $this->assertTrue(
            $this->urlService->isUrl('https://www.example.com/')
        );

        $this->assertFalse(
            $this->urlService->isUrl('https://www.example.com/ is a great webpage')
        );

        $this->assertFalse(
            $this->urlService->isUrl('Visit: https://www.example.com/')
        );
    }
}
