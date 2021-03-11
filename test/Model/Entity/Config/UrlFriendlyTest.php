<?php
namespace MonthlyBasis\StringTest\Model\Entity\Config;

use MonthlyBasis\String\Model\Entity as StringEntity;
use PHPUnit\Framework\TestCase;

class UrlFriendlyTest extends TestCase
{
    protected function setUp(): void
    {
        $this->urlFriendlyEntity = new StringEntity\Config\UrlFriendly();
    }

    public function test_gettersAndSetters()
    {
        $this->assertTrue(
            $this->urlFriendlyEntity->getConvertToLowercase()
        );
        $convertToLowercase = false;
        $this->assertSame(
            $this->urlFriendlyEntity,
            $this->urlFriendlyEntity->setConvertToLowercase($convertToLowercase)
        );
        $this->assertSame(
            $convertToLowercase,
            $this->urlFriendlyEntity->getConvertToLowercase()
        );
    }
}
