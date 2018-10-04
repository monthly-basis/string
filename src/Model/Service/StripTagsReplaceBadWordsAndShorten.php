<?php
namespace LeoGalleguillos\String\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;

class StripTagsReplaceBadWordsAndShorten
{
    public function __construct(
        StringService\ReplaceBadWords $replaceBadWordsService
    ) {
        $this->replaceBadWordsService = $replaceBadWordsService;
    }

    public function stripTagsReplaceBadWordsAndShorten(
        string $string,
        int $maxLength
    ) : string {
        $string = strip_tags($string);
        $string = preg_replace('/\s+/s', ' ', $string);
        $string = trim($string);

        $string = $this->replaceBadWordsService->replacebadWords($string);

        $string = wordwrap($string, $maxLength);
        $string = explode("\n", $string);

        return $string[0];
    }
}
