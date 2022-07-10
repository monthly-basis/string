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

    public function getFirstSentence(
        string $string
    ): string {
        $stringShortened = $this->shortenService->shorten($string, 200);

        $sentences = $this->sentencesService->getSentences($stringShortened);

        return $sentences[0] ?? '';
    }
}
