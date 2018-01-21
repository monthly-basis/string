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

    public function testGetNGrams()
    {
        $string = 'bird cat dog elephant cat dog bird cat dog';
        $nGrams = [
            2 => [
                'bird cat' => [
                    'count' => 2,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
            ],
            3 => [
                'bird cat dog' => [
                    'count' => 2,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
            ],
            4 => [
                'bird cat dog elephant' => [
                    'count' => 1,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                        'elephant',
                    ],
                ],
            ],
        ];
        $this->assertSame(
            $nGrams[2]['bird cat'],
            $this->nGramsService->getNGrams($string)[2]['bird cat']
        );
        $this->assertSame(
            $nGrams[3]['bird cat dog'],
            $this->nGramsService->getNGrams($string)[3]['bird cat dog']
        );
        $this->assertSame(
            $nGrams[4]['bird cat dog elephant'],
            $this->nGramsService->getNGrams($string, 2, 4)[4]['bird cat dog elephant']
        );
    }
}
