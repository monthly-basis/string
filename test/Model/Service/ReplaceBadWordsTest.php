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
        $this->replaceBadWordsService = new StringService\ReplaceBadWords();
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
        $string = 'hello world';
        $this->assertSame(
            'hello world',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'fuck you';
        $this->assertSame(
            '!@#$%^& you',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'shut the FuCk up';
        $this->assertSame(
            'shut the !@#$%^& up',
            $this->replaceBadWordsService->replaceBadWords($string)
        );

        $string = 'hello fucker HOLY SHIT';
        $this->assertSame(
            'hello !@#$%^&er HOLY !@#$%^&',
            $this->replaceBadWordsService->replaceBadWords($string)
        );
    }
}
