<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class NGramsTest extends TestCase
{
    protected function setUp()
    {
        $this->nGramsService = new StringService\NGrams();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(StringService\NGrams::class, $this->nGramsService);
    }
}
