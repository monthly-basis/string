<?php
namespace MonthlyBasis\StringTest\Model\Factory\Config;

use MonthlyBasis\String\Model\Entity as StringEntity;
use MonthlyBasis\String\Model\Factory as StringFactory;
use PHPUnit\Framework\TestCase;

class UrlFriendlyTest extends TestCase
{
    protected function setUp(): void
    {
        $this->urlFriendlyFactory = new StringFactory\Config\UrlFriendly();
    }

    public function test_buildFromArray_emptyArray_defaultEntity()
    {
        $urlFriendlyEntity = new StringEntity\Config\UrlFriendly();
        $array = [];

        $this->assertEquals(
            $urlFriendlyEntity,
            $this->urlFriendlyFactory->buildFromArray($array)
        );
    }

    public function test_buildFromArray_customArray_customEntity()
    {
        $urlFriendlyEntity = (new StringEntity\Config\UrlFriendly())
            ->setConvertToLowercase(false)
            ;
        $array = [
            'convert_to_lowercase' => false,
        ];

        $this->assertEquals(
            $urlFriendlyEntity,
            $this->urlFriendlyFactory->buildFromArray($array)
        );
    }
}
