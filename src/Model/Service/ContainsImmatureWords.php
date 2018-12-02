<?php
namespace LeoGalleguillos\String\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;

class ContainsImmatureWords
{
    public function __construct(
        StringService\RegularExpressionsOfImmatureWords $regularExpressionsOfImmatureWords
    ) {
        $this->regularExpressionsOfImmatureWords = $regularExpressionsOfImmatureWords;
    }

    public function containsImmatureWords(
        string $string
    ): bool {
        $patterns = $this->regularExpressionsOfImmatureWords
                         ->getRegularExpressionsOfImmatureWords();

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $string)) {
                return true;
            }
        }

        return false;
    }
}
