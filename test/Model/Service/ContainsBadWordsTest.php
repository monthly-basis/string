<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

/**
 * WARNING
 *
 * The following code contains extremely explicit language.
 *
 * We have written code to determine whether a string contains bad words.
 *
 * In order to ensure that this code is functioning properly,
 * we must use explicit language in our own code.
 *
 * Sorry.
 */
class ContainsBadWordsTest extends TestCase
{
    protected function setUp()
    {
        $this->containsBadWordsService = new StringService\ContainsBadWords();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\ContainsBadWords::class,
            $this->containsBadWordsService
        );
    }

    public function testContainsBadWords()
    {
        $string = 'bass fish kushites are delicious';
        $this->assertFalse(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'shit';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'dick tracy wharfage';
        $this->assertFalse(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'fuck you';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'shut the FuCk up';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'hello fucker HOLY SHIT';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = "foo faggot fagot bar DumbASS baz\n\n";
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = "ass bassoon sassy ASS\n\n";
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = ' fag wharfage';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'fukuyama fuk foo';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );

        $string = 'dick tracy can suck my dick';
        $this->assertTrue(
            $this->containsBadWordsService->containsBadWords($string)
        );
    }
}
