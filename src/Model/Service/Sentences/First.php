<?php
namespace MonthlyBasis\String\Model\Service\Sentences;

use MonthlyBasis\String\Model\Service as StringService;

class First
{
    public function __construct(
        StringService\Sentences $sentencesService,
        StringService\Shorten $shortenService
    ) {
        $this->sentencesService = $sentencesService;
        $this->shortenService   = $shortenService;
    }

    public function getFirstSentences(
        string $string,
        int $maxLength = 125
    ): string {
        /*
         * If string is shortened to max length, then last sentence can get
         * shortened and inadvertently added to first sentences.
         *
         * Therefore, shorten to max length plus 10 so that last sentence is not
         * appended if it is too long.
         */
        $stringShortened = $this->shortenService->shorten($string, $maxLength + 10);

        $sentences = $this->sentencesService->getSentences($stringShortened);

        if (empty($sentences)) {
            return '';
        }

        if (
            count($sentences) == 1
            || strlen($sentences[0]) >= $maxLength
        ) {
            return $sentences[0];
        }

        $firstSentences = '';
        foreach ($sentences as $sentence) {
            if (strlen($firstSentences . $sentence) > $maxLength) {
                break;
            }
            $firstSentences .= $sentence . ' ';
        }
        return trim($firstSentences);
    }
}
