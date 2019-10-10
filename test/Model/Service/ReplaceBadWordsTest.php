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

    public function testReplaceBadWords()
    {
        $r = '!@#$%^&';

        $string = "\t\tthis sentence has line breaks and no bad words\r\n\n";;
        $this->assertSame(
            $string,
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'hello world Kushite s*h*i.t! s.hit sh*t shot doushite shtick';
        $this->assertSame(
            'hello world Kushite !@#$%^&! !@#$%^& !@#$%^& shot doushite shtick',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'hclkafck fck fuck you F U C K f.uck f-u-c----k f*ck f.ck ummm';
        $this->assertSame(
            "hclkafck $r !@#$%^& you !@#$%^& !@#$%^& !@#$%^& !@#$%^& !@#$%^& ummm",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'shut the FuCk up p   u   s   sy fluck f.uck f*cking a ss f**k';
        $this->assertSame(
            "shut the !@#$%^& up !@#$%^& fluck !@#$%^& {$r}ing $r $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'hello fucker HOLY SHIT shithead nogg';
        $this->assertSame(
            'hello !@#$%^&er HOLY !@#$%^& !@#$%^&head nogg',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'F-A-G foo faggot fagot bar DumbASS baz a$S';
        $this->assertSame(
            "!@#$%^& foo !@#$%^&got !@#$%^&ot bar !@#$%^& baz $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'ass bassoon sassy ASS a$$ @$$ @ss n1gg';
        $this->assertSame(
            '!@#$%^& bassoon sassy !@#$%^& !@#$%^& !@#$%^& !@#$%^& !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = ' fag wharfage suck dick suck a dick d!ck tracy ';
        $this->assertSame(
            " $r whar{$r}e suck $r suck a $r $r tracy ",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'fukuyama fuk foo cucumber cum boobs pron porn poɾn of office';
        $this->assertSame(
            "fukuyama !@#$%^& foo cucumber !@#$%^& !@#$%^& pron $r $r of office",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'bullshit bullsht dick tracy can suck my dick F OFF';
        $this->assertSame(
            "!@#$%^& !@#$%^& $r tracy can $r !@#$%^& $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'cockadoodledoo cock sucker slut bitch b*tch batch betcha bltch';
        $this->assertSame(
            'cockadoodledoo !@#$%^&er !@#$%^& !@#$%^& !@#$%^& batch betcha !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'suck my b!tch b.itch b.i.t.c.h b i t c h sunuvabitch b itch';
        $this->assertSame(
            '!@#$%^& !@#$%^& !@#$%^& !@#$%^& !@#$%^& sunuva!@#$%^& !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'dumba** a**';
        $this->assertSame(
            "$r $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'ass @$$ asset asses assess as*hole as S pass area**';
        $this->assertSame(
            "$r $r asset $r assess $r as S pass area**",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'bitch bi*ch bich bicth biitch';
        $this->assertSame(
            "$r $r $r $r $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'cunt c__unt';
        $this->assertSame(
            "$r $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'dick dikk d**k d!#k d)/k d***k Emily Dickinson';
        $this->assertSame(
            "$r $r $r $r d)/k d***k Emily Dickinson",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'f4ggot';
        $this->assertSame(
            "{$r}got",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'f = 123 fuc F=kx F/k fuking fvck f*** f--- fu*king Confucius';
        $this->assertSame(
            "f = 123 $r F=kx F/k $r $r $r $r $r Confucius",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'nigg n1gg nig g ni99 n!gga n ! g g a In 1999 ɴigg';
        $this->assertSame(
            "$r $r $r $r {$r}a {$r} a In 1999 $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'penis Peni5 pennies';
        $this->assertSame(
            "$r $r pennies",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'shit sh!t sh1t';
        $this->assertSame(
            "$r $r $r",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'competition TIT tits titties petit';
        $this->assertSame(
            "competition $r $r $r petit",
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'xvideos.com';
        $this->assertSame(
            "$r.com",
            $this->replaceBadWordsService->replaceBadWords($string)
        );
    }
}
