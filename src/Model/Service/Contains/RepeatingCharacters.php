<?php
namespace LeoGalleguillos\String\Model\Service\Contains;

use LeoGalleguillos\String\Model\Service as StringService;

class RepeatingCharacters
{
    public function containsRepeatingCharacters(string $string): bool
    {
        // Match one character 4 or more times.
        $pattern = '/(.)\1{3,}/';
        if (preg_match($pattern, $string)) {
            return true;
        }

        return false;
    }
}
