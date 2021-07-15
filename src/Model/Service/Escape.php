<?php
namespace MonthlyBasis\String\Model\Service;

class Escape
{
    public function escape(
        string $string = null
    ): string {
        return htmlspecialchars(
            $string,
            ENT_QUOTES | ENT_SUBSTITUTE | ENT_DISALLOWED
        );
    }
}
