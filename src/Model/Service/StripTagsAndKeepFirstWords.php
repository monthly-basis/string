<?php
namespace MonthlyBasis\String\Model\Service;

class StripTagsAndKeepFirstWords
{
    public function stripTagsAndKeepFirstWords(
        string $string,
        int $numberOfWords
    ) : string {
        $string     = strip_tags($string);
        $string     = preg_replace('/\s+/s', ' ', $string);
        $string     = trim($string);
        $words      = explode(' ', $string, $numberOfWords + 1);
        $firstWords = implode(' ', array_slice($words, 0, $numberOfWords));
        return $firstWords;
    }
}
