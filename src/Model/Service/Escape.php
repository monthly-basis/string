<?php
declare(strict_types=1);

namespace MonthlyBasis\String\Model\Service;

class Escape
{
    public function escape(
        string|int|null $string
    ): string {
        if (is_null($string)) {
            return '';
        }

        return htmlspecialchars(
            strval($string),
            ENT_QUOTES | ENT_SUBSTITUTE | ENT_DISALLOWED
        );
    }
}
