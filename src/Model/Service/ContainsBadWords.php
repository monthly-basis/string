<?php
namespace LeoGalleguillos\String\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;

class ContainsBadWords
{
    public function __construct(
        StringService\RegularExpressionsOfBadWords $regularExpressionsOfBadWords
    ) {
        $this->regularExpressionsOfBadWords = $regularExpressionsOfBadWords;
    }

    public function containsBadWords(
        string $string
    ): bool {
        $patterns = $this->regularExpressionsOfBadWords
                         ->getRegularExpressionsOfBadWords();

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $string)) {
                return true;
            }
        }

        return false;
    }
}
