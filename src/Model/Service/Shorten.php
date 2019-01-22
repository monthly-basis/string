<?php
namespace LeoGalleguillos\String\Model\Service;

class Shorten
{
    /**
     * Shorten
     *
     * @param string $string
     * @param int $maxLength
     * @return string
     */
    public function shorten(
        string $string,
        int $maxLength
    ): string {
        $string = preg_replace('/\s+/s', ' ', $string);
        $string = trim($string);

        $string = wordwrap($string, $maxLength, "\n", true);
        $string = explode("\n", $string);

        return $string[0];
    }
}
