<?php
namespace LeoGalleguillos\String\Model\Service;

/**
 * @deprecated Use MonthlyBasis\ContentModeration\Model\Service\Replace\Spaces() instead.
 */
class CleanUpSpaces
{
    public function cleanUpSpaces($string)
    {
        $string = preg_replace('/\s+/', ' ', $string);
        return trim($string);
    }
}
