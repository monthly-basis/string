<?php
namespace MonthlyBasis\String\Model\Service;

use MonthlyBasis\String\Model\Exception as StringException;

class Random
{
    public function getRandomString(
        int $length
    ): string {
        if ($length <= 0) {
            throw new StringException('Length must be greater than 0.');
        }

        if ($length % 2 == 0) {
            return bin2hex(random_bytes($length / 2));
        }

        return substr(
            bin2hex(random_bytes(($length + 1) / 2)),
            0,
            $length
        );
    }
}
