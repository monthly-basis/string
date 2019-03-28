<?php
namespace LeoGalleguillos\String\Model\Service;

class CleanUpSpaces
{
    public function cleanUpSpaces($string)
    {
        $string = preg_replace('/\s+/', ' ', $string);
        return trim($string);
    }
}
