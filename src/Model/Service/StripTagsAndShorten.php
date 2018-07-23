<?php
namespace LeoGalleguillos\String\Model\Service;

class StripTagsAndShorten
{
    public function stripTagsAndShorten(
        string $string,
        int $maxLength
    ) : string {
        $string = strip_tags($string);
        $string = preg_replace('/\s+/s', ' ', $string);
        $string = trim($string);

        $string = wordwrap($string, $maxLength);
        $string = explode("\n", $string);

        return $string[0];
    }
}
