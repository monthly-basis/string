<?php
namespace LeoGalleguillos\String\Model\Service;

class Shorten
{
    public function shorten(
        string $string,
        int $maxLength
    ): string {
        $string = mb_convert_encoding($string, 'UTF-8');

        $string = preg_replace('/\s+/su', ' ', $string);
        $string = trim($string);

        $string = wordwrap($string, $maxLength, "\n", true);
        $string = explode("\n", $string);

        return $string[0];
    }
}
