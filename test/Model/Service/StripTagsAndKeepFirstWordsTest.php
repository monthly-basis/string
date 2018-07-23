<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class StripTagsAndKeepFirstWordsTest extends TestCase
{
    protected function setUp()
    {
        $this->stripTagsAndKeepFirstWordsService = new StringService\StripTagsAndKeepFirstWords();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\StripTagsAndKeepFirstWords::class,
            $this->stripTagsAndKeepFirstWordsService
        );
    }

    public function testGetUrls()
    {
        $this->assertSame(
            '',
            $this->stripTagsAndKeepFirstWordsService->stripTagsAndKeepFirstWords(
                '',
                2
            )
        );

        $string = '  <b> hello</b>  <i>    world  </i><a>  ';
        $this->assertSame(
            'hello',
            $this->stripTagsAndKeepFirstWordsService->stripTagsAndKeepFirstWords(
                $string,
                1
            )
        );
        $this->assertSame(
            'hello world',
            $this->stripTagsAndKeepFirstWordsService->stripTagsAndKeepFirstWords(
                $string,
                2
            )
        );
        $this->assertSame(
            'hello world',
            $this->stripTagsAndKeepFirstWordsService->stripTagsAndKeepFirstWords(
                $string,
                3
            )
        );

        $string = 'Lorem ipsum dolor sit amet, mei ad sale vocent expetenda, ut natum saepe insolens qui. In mel animal facilisi repudiare, in qui error platonem, quando possit vim ne. Quot feugait eum in, ne est causae fuisset contentiones. Id phaedrum antiopam interpretaris nec. Ad per sint clita posidonium. No pri essent commodo voluptua';
        $this->assertSame(
            'Lorem ipsum dolor sit amet, mei ad sale vocent expetenda,',
            $this->stripTagsAndKeepFirstWordsService->stripTagsAndKeepFirstWords(
                $string,
                10
            )
        );
    }
}
