<?php
namespace MonthlyBasis\String\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;

class StripTagsAndShorten
{
    public function __construct(
        StringService\Shorten $shortenService
    ) {
        $this->shortenService = $shortenService;
    }

    public function stripTagsAndShorten(
        string $string,
        int $maxLength
    ) : string {
        $string = strip_tags($string);
        return $this->shortenService->shorten(
            $string,
            $maxLength
        );
    }
}
