<?php
namespace LeoGalleguillos\String\Model\Service;

class Escape
{
    public function escape(
        string $string
    ) : string {
        return htmlspecialchars(
            $string,
            ENT_QUOTES | ENT_SUBSTITUTE | ENT_DISALLOWED
        );
    }
}
