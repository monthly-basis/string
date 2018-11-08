<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

/**
 * WARNING
 *
 * The following code contains extremely explicit language.
 *
 * We have written code to replace bad words posted by users with !@#$%^&.
 *
 * In order to ensure that this code is functioning properly,
 * we must use explicit language in our own code.
 *
 * Sorry.
 */
class ReplaceBadWordsTest extends TestCase
{
    protected function setUp()
    {
        $this->regularExpressionsOfBadWordsService = new StringService\RegularExpressionsOfBadWords();
        $this->replaceBadWordsService = new StringService\ReplaceBadWords(
            $this->regularExpressionsOfBadWordsService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            StringService\ReplaceBadWords::class,
            $this->replaceBadWordsService
        );
    }

    public function testReplaceBadWords()
    {
        $string = 'hello world Kushite';
        $this->assertSame(
            'hello world Kushite',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'fuck you F U C K';
        $this->assertSame(
            '!@#$%^& you !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'shut the FuCk up p   u   s   sy';
        $this->assertSame(
            'shut the !@#$%^& up !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'hello fucker HOLY SHIT shithead';
        $this->assertSame(
            'hello !@#$%^&er HOLY !@#$%^& !@#$%^&head',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = "foo faggot fagot bar DumbASS baz\n\n";
        $this->assertSame(
            "foo !@#$%^& !@#$%^& bar !@#$%^& baz\n\n",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = "ass bassoon sassy ASS\n\n";
        $this->assertSame(
            "!@#$%^& bassoon sassy !@#$%^&\n\n",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = ' fag wharfage';
        $this->assertSame(
            ' !@#$%^& wharfage',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'fukuyama fuk foo';
        $this->assertSame(
            'fukuyama !@#$%^& foo',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'bullshit dick tracy can suck my dick';
        $this->assertSame(
            '!@#$%^& dick tracy can suck !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'cockadoodledoo cock sucker slut';
        $this->assertSame(
            'cockadoodledoo !@#$%^&er !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );
    }
}
