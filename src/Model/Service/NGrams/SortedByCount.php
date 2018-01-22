<?php
namespace LeoGalleguillos\String\Model\Service\NGrams;

use LeoGalleguillos\String\Model\Service as StringService;

class SortedByCount
{
    public function __construct(
        StringService\NGrams $nGramsService
    ) {
        $this->nGramsService = $nGramsService;
    }

    /**
     * Get n-grams sorted by count.
     *
     * @param string $string
     * @return array
     */
    public function getNGramsSortedByCount(
        string $string,
        int $minLength = 2,
        int $maxLength = 3
    ) : array {
        $nGrams = $this->nGramsService->getNGrams($string, $minLength, $maxLength);

        for ($length = $minLength; $length <= $maxLength; $length++) {
            uasort($nGrams[$length], function($nGrams1, $nGrams2) {
                return $nGrams2['count'] - $nGrams1['count'];
            });
        }

        return $nGrams;
    }
}
