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
        int $minLength = 10,
        int $maxLength = 100,
        int $lookAhead = 25
    ): string {
        /*
         * If string is shortened to max length, then last sentence can get
         * shortened and inadvertently added to first sentences.
         *
         * Therefore, shorten to max length plus "look ahead" so that
         * last sentence is not appended if it is too long.
         *
         * Also, if first sentence is longer than max length, then try to finish
         * the sentence by looking for end of sentence within the next "look ahead" characters.
         */
        $stringShortened = $this->shortenService->shorten($string, $maxLength + $lookAhead);

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
            if (strlen($firstSentences) < $minLength) {
                $firstSentences .= $sentence . ' ';
                continue;
            }
            if (strlen($firstSentences . $sentence) > $maxLength) {
                break;
            }
            $firstSentences .= $sentence . ' ';
        }
        return trim($firstSentences);
    }
}
