<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class UrlsTest extends TestCase
{
    protected function setUp()
    {
        $this->startsWithService = new StringService\StartsWith();
        $this->urlsService = new StringService\Urls(
            $this->startsWithService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\Urls::class,
            $this->urlsService
        );
    }
}
