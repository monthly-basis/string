<?php
namespace MonthlyBasis\String\Model\Service;

use MonthlyBasis\String\Model\Entity as StringEntity;

class UrlFriendly
{
    public function __construct(
        StringEntity\Config\UrlFriendly $urlFriendlyEntity
    ) {
        $this->urlFriendlyEntity = $urlFriendlyEntity;
    }

    public function getUrlFriendly($string)
    {
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
        if ($this->urlFriendlyEntity->getConvertToLowercase()) {
            // Convert string to lowercase.
            $string = strtolower($string);
        }

        return $string;
    }
}
