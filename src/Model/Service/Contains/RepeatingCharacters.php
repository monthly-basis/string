<?php
namespace LeoGalleguillos\String\Model\Service\Contains;

use LeoGalleguillos\String\Model\Service as StringService;

class RepeatingCharacters
{
    public function containsRepeatingCharacters(string $string): bool
    {
        // Match 1 character at least 5 times.
        $pattern = '/(.)\1{4,}/';
        if (preg_match($pattern, $string)) {
            return true;
        }

        return false;
    }
}
