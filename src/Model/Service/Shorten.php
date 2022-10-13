<?php
namespace MonthlyBasis\String\Model\Service;

class Shorten
{
    public function shorten(
        string $string,
        int $maxLength
    ): string {
        /*
         * Fourth parameter of wordwrap(), cut_long_words, cannot be true
         * if the max length is set to 0. Doing so will result in ValueError.
         *
         * Therefore, if the max length is 0, return empty string.
         */
        if ($maxLength == 0) {
            return '';
        }

        $string = mb_convert_encoding($string, 'UTF-8');

        $string = preg_replace('/\s+/su', ' ', $string);
        $string = trim($string);

        $string = wordwrap($string, $maxLength, "\n", true);
        $string = explode("\n", $string);

        return $string[0];
    }
}
