<?php
namespace MonthlyBasis\String\Model\Service\Contains;

class CaseInsensitive
{
    public function caseInsensitive(
        string $haystack,
        string $needle
    ): bool {
        return (stripos($haystack, $needle) !== false);
    }
}
