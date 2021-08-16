<?php
namespace MonthlyBasis\String\Model\Service;

class Url
{
    public function isUrl(
        string $string
    ): bool {
        return preg_match('/^http\S+$/', $string);
    }
}
