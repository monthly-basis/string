<?php
namespace LeoGalleguillos\String\Model\Service;

class Shorten
{
    public function shorten(
        string $string,
        int $maxLength
    ) : string {
        $string = preg_replace('/\s+/s', ' ', $string);
        $string = trim($string);

        $string = wordwrap($string, $maxLength);
        $string = explode("\n", $string);

        return $string[0];
    }
}
