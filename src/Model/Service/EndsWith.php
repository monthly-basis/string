<?php
namespace LeoGalleguillos\String\Model\Service;

class EndsWith
{
    public function endsWith(
        string $haystack,
        string $needle
    ) : bool {
        $length = strlen($needle);

        if ($length == 0) {
            return false;
        }

        return (substr($haystack, -$length) === $needle);
    }
}
