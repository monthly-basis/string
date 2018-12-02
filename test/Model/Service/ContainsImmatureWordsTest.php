<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class ContainsImmatureWordsTest extends TestCase
{
    protected function setUp()
    {
        $this->regularExpressionsOfImmatureWordsService = new StringService\RegularExpressionsOfImmatureWords();
        $this->containsImmatureWordsService = new StringService\ContainsImmatureWords(
            $this->regularExpressionsOfImmatureWordsService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\ContainsImmatureWords::class,
            $this->containsImmatureWordsService
        );
    }

    public function testContainsImmatureWords()
    {
        $this->assertFalse(
            $this->containsImmatureWordsService->containsImmatureWords('hello world')
        );
        $this->assertFalse(
            $this->containsImmatureWordsService->containsImmatureWords('but far pop')
        );

        $this->assertTrue(
            $this->containsImmatureWordsService->containsImmatureWords('b.u.t.t head')
        );
        $this->assertTrue(
            $this->containsImmatureWordsService->containsImmatureWords('FARTMASTER')
        );
        $this->assertTrue(
            $this->containsImmatureWordsService->containsImmatureWords('Lick My Poop')
        );
    }
}
