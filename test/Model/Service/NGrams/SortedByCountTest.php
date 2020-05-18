<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class SortedByCountTest extends TestCase
{
    protected function setUp(): void
    {
        $this->nGramsServiceMock = $this->createMock(
            StringService\NGrams::class
        );
        $this->nGramsSortedByCountService = new StringService\NGrams\SortedByCount(
            $this->nGramsServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\NGrams\SortedByCount::class,
            $this->nGramsSortedByCountService
        );
    }

    public function testGetNGramsSortedByCount()
    {
        $nGrams = [
            2 => [
                'bird cat' => [
                    'count' => 2,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
                'cat dog' => [
                    'count' => 3,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
                'dog elephant' => [
                    'count' => 1,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
            ],
            3 => [
                'bird cat dog' => [
                    'count' => 50,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
                'dog elephant fox' => [
                    'count' => 100,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
            ],
            4 => [
                'bird cat dog fish' => [
                    'count' => 9,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
            ],
        ];
        $nGramsSortedByCount = [
            2 => [
                'cat dog' => [
                    'count' => 3,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
                'bird cat' => [
                    'count' => 2,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
                'dog elephant' => [
                    'count' => 1,
                    'sequence' => [
                        'bird',
                        'cat',
                    ],
                ],
            ],
            3 => [
                'dog elephant fox' => [
                    'count' => 100,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
                'bird cat dog' => [
                    'count' => 50,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
            ],
            4 => [
                'bird cat dog fish' => [
                    'count' => 9,
                    'sequence' => [
                        'bird',
                        'cat',
                        'dog',
                    ],
                ],
            ],
        ];
        $this->nGramsServiceMock->method('getNGrams')->willReturn(
            $nGrams
        );
        $this->assertEquals(
            $nGramsSortedByCount,
            $this->nGramsSortedByCountService->getNGramsSortedByCount('', 2, 4)
        );
    }
}
