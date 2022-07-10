<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class SentencesTest extends TestCase
{
    protected function setUp(): void
    {
        $this->sentencesService = new StringService\Sentences();
    }

    public function test_getSentences_variousStrings_expectedResult()
    {
        $string = 'First sentence. Second sentence. Third sentence.';
        $this->assertSame(
            [
                'First sentence.',
                'Second sentence.',
                'Third sentence.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'Ends in question mark? Second sentence. Third sentence.';
        $this->assertSame(
            [
                'Ends in question mark?',
                'Second sentence.',
                'Third sentence.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'No spaces around period.Second sentence.';
        $this->assertSame(
            [
                'No spaces around period.',
                'Second sentence.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'No spaces around question mark?Second sentence.';
        $this->assertSame(
            [
                'No spaces around question mark?',
                'Second sentence.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'Space before period but not after .Second sentence.';

        $this->assertSame(
            [
                'Space before period but not after .',
                'Second sentence.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'Decimal 3.14. Second sentence.';
        $this->assertSame(
            [
                'Decimal 3.14.',
                'Second sentence.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'Space then number after exclamation point! 5 star rating.';
        $this->assertSame(
            [
                'Space then number after exclamation point!',
                '5 star rating.',
            ],
            $this->sentencesService->getSentences($string),
        );

        /*
         * At the present time, the service does not return the desired result.
         */
        $string = 'Number after period.5 star rating.';
        $this->assertSame(
            [
                'Number after period.5 star rating.',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = 'Sentence with no punctuation';
        $this->assertSame(
            [
                'Sentence with no punctuation',
            ],
            $this->sentencesService->getSentences($string),
        );

        $string = "Sentence\nwith\rline breaks.";
        $this->assertSame(
            [
                $string,
            ],
            $this->sentencesService->getSentences($string),
        );
    }
}
