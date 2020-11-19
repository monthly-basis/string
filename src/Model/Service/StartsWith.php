<?php
namespace MonthlyBasis\String\Model\Service;

class StartsWith
{
    public function startsWith(
        string $haystack,
        string $needle
    ) : bool {
        return (substr($haystack, 0, strlen($needle)) === $needle);
    }
}
