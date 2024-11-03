<?php

declare(strict_types=1);

namespace MonthlyBasis\String\Model\Service\Contains;

class Latex
{
    public function containsLatex(string $string): bool
    {
        $patterns = [
            '/\\\\\(.+?\\\\\)/',    // Matches \( ... \)
            '/\\\\\[.+?\\\\\]/s',   // Matches \[ ... \] across multiple lines
            //'/\$.+?\$/',          // Matches $ ... $
            //'/\\\\begin\{.+?\}/', // Matches \begin{...}
            //'/\\\\end\{.+?\}/'    // Matches \end{...}
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $string)) {
                return true;
            }
        }

        return false;
    }
}
