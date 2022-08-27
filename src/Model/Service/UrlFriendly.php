<?php
namespace MonthlyBasis\String\Model\Service;

class UrlFriendly
{
    public function getUrlFriendly(
        $string,
        bool $convertToLowercase = true
    ) {
        // Remove apostrophes.
        $string = preg_replace('/\'/', '', $string);
        $string = preg_replace('/\’/', '', $string);

        // Replace any non-alphanumerics with a hyphen.
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);

        // Replace two or more consecutive hyphens with a single hyphen.
        $string = preg_replace('/-{2,}/', '-', $string);

        // Trim hyphens from beginning and end of string.
        $string = trim($string, '-');

        if (strlen($string) == 0) {
            return '-';
        }
        if ($convertToLowercase) {
            $string = strtolower($string);
        }

        return $string;
    }
}
