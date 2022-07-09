<?php
namespace MonthlyBasis\String\Model\Service;

/**
 * If you only need the first sentence or first few sentences of a string,
 * you should consider shortening the string first so that php does not
 * unnecessarily preg_split a huge string and store it in memory.
 *
 * Getting sentences from a string actually appears to be a complex process.
 * There is probably no perfect regular expression that is 100% accurate.
 * So, what we have for now is good enough and may be improved in the future.
 *
 * When this is improved in the future, we will probably need to cache
 * results to avoid lengthy CPU processing time with php.
 */
class Sentences
{
    public function getSentences(
        string $string
    ): array {
        $pattern = '/[\!\.\?]\K(?!\d)\s*/';
        $limit   = 3;

        return preg_split($pattern, $string, $limit, PREG_SPLIT_NO_EMPTY);
    }
}
