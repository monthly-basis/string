<?php
namespace LeoGalleguillos\String\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;

class ReplaceBadWords
{
    public function __construct(
        StringService\RegularExpressionsOfBadWords $regularExpressionsOfBadWords
    ) {
        $this->regularExpressionsOfBadWords = $regularExpressionsOfBadWords;
    }

    public function replaceBadWords(
        string $string
    ): string {
        $patterns    = $this->regularExpressionsOfBadWords
                            ->getRegularExpressionsOfBadWords();
        $replacement = '!@#$%^&';
        $string = preg_replace($patterns, $replacement, $string);
        return is_null($string) ? '' : $string;
    }
}
