<?php
namespace MonthlyBasis\String\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;

class Urls
{
    public function __construct(
        StringService\StartsWith $startsWithService
    ) {
        $this->startsWithService = $startsWithService;
    }

    /**
     * Get URLs
     *
     * @param string $string
     * @return array
     */
    public function getUrls(
        string $string
    ) : array {
        $urls  = [];
        $words = preg_split('/\s+/', $string);

        foreach ($words as $word) {
            if ($this->startsWithService->startsWith($word, 'http')) {
                $urls[] = $word;
            }
        }

        return $urls;
    }
}
