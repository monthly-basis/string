<?php
namespace LeoGalleguillos\String\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;

class StripTagsReplaceBadWordsAndShorten
{
    public function __construct(
        StringService\ReplaceBadWords $replaceBadWordsService,
        StringService\Shorten $shortenService
    ) {
        $this->replaceBadWordsService = $replaceBadWordsService;
        $this->shortenService         = $shortenService;
    }

    public function stripTagsReplaceBadWordsAndShorten(
        string $string,
        int $maxLength
    ): string {
        $string = strip_tags($string);
        $string = $this->replaceBadWordsService->replacebadWords($string);
        return $this->shortenService->shorten(
            $string,
            $maxLength
        );
    }
}
