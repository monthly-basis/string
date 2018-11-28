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
        $string = 'hello world Kushite s*h*i.t! s.hit sh*t shot doushite shtick';
        $this->assertSame(
            'hello world Kushite !@#$%^&! !@#$%^& !@#$%^& shot doushite shtick',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'fuck you F U C K f.uck f-u-c----k f*ck f.ck ummm';
        $this->assertSame(
            '!@#$%^& you !@#$%^& !@#$%^& !@#$%^& !@#$%^& !@#$%^& ummm',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'shut the FuCk up p   u   s   sy fluck f.uck';
        $this->assertSame(
            'shut the !@#$%^& up !@#$%^& fluck !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'hello fucker HOLY SHIT shithead';
        $this->assertSame(
            'hello !@#$%^&er HOLY !@#$%^& !@#$%^&head',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = "F-A-G foo faggot fagot bar DumbASS baz\n\n";
        $this->assertSame(
            "!@#$%^& foo !@#$%^&got !@#$%^&ot bar !@#$%^& baz\n\n",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = "ass bassoon sassy ASS\n\n";
        $this->assertSame(
            "!@#$%^& bassoon sassy !@#$%^&\n\n",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = ' fag wharfage suck dick suck a dick dick tracy';
        $this->assertSame(
            ' !@#$%^& whar!@#$%^&e !@#$%^& !@#$%^& dick tracy',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'fukuyama fuk foo cucumber cum boobs pron porn';
        $this->assertSame(
            'fukuyama !@#$%^& foo cucumber !@#$%^& !@#$%^& pron !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'bullshit bullsht dick tracy can suck my dick';
        $this->assertSame(
            '!@#$%^& !@#$%^& dick tracy can suck !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'cockadoodledoo cock sucker slut';
        $this->assertSame(
            'cockadoodledoo !@#$%^&er !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );
    }
}
