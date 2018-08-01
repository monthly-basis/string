<?php
namespace LeoGalleguillos\String\Model\Service;

class KeepFirstWords
{
    public function keepFirstWords(
        string $string,
        int $numberOfWords
    ) : string {
        $string     = preg_replace('/\s+/s', ' ', $string);
        $string     = trim($string);
        $words      = explode(' ', $string, $numberOfWords + 1);
        $firstWords = implode(' ', array_slice($words, 0, $numberOfWords));
        return $firstWords;
    }
}
