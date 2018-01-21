<?php
namespace LeoGalleguillos\String\Model\Service;

class NGrams
{
    /**
     * Get n-grams.
     *
     * @param string $string
     * @return array
     */
    public function getNGrams(
        string $string,
        int $minLength = 2,
        int $maxLength = 3
    ) : array {
        $words = preg_split('/\s+/', $string);

        $nGrams    = [];
        for ($length = $minLength; $length <= $maxLength; $length++) {
            $nGrams[$length] = [];
        }

        foreach ($words as $offset => $word) {
            for ($length = $minLength; $length <= $maxLength; $length++) {
                if ($this->isNGramPossible($words, $offset, $length)) {
                    $nGrams[$length] = $this->incrementCount(
                        $nGrams[$length],
                        $words,
                        $offset,
                        $length
                    );
                } else {
                    /*
                     * No need to continue looping through lengths because:
                     * if no n-gram is possible for length,
                     * then no n-gram is possible for length + 1, length + 2, ...
                     */
                    continue 2;
                }
            }
        }

        return $nGrams;
    }

    /**
     * Is n-gram possible.
     *
     * @param array $words
     * @param int $offset Starting index of $words
     * @param int $length Length of n-gram
     */
    protected function isNGramPossible(array $words, int $offset, int $length)
    {
        for ($x = 0; $x < $length; $x++) {
            if (!isset($words[$offset + $x])) {
                return false;
            }
        }

        return true;
    }

    protected function incrementCount($nGrams, $words, $offset, $length)
    {
        $sequenceArray  = array_slice($words, $offset, $length);
        $sequenceString = implode(' ', $sequenceArray);

        if (isset($nGrams[$sequenceString])) {
            $nGrams[$sequenceString]['count']++;
        } else {
            $nGrams[$sequenceString] = [
                'count' => 1,
                'sequence' => $sequenceArray,
            ];
        }

        return $nGrams;
    }
}
