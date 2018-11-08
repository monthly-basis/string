<?php
namespace LeoGalleguillos\String\Model\Service;

/**
 * WARNING
 *
 * The following code contains extremely explicit language.
 *
 * We have written code to determine whether a string contains bad words.
 *
 * In order to ensure that this code is functioning properly,
 * we must use explicit language in our own code.
 *
 * Sorry.
 */
class ContainsBadWords
{
    public function containsBadWords(
        string $string
    ): bool {
        $patterns = [
            '/\bass\b/i',
            '/asshole/i',
            '/bastard/i',
            '/b1tch/i',
            '/bitch/i',
            '/bullshit/i',
            '/cocksucker/i',
            '/cunt/i',
            '/dammit/i',
            '/damnit/i',
            '/dumbass/i',
            '/\bfag\b/i',
            '/\bfuk\b/i',
            '/fagg?ot/i',
            '/f\s*u\s*c\s*k/i',
            '/jackass/i',
            '/masturbat/i',
            '/my dick/i',
            '/n1gg/i',
            '/nigg/i',
            '/orgasm/i',
            '/penis/i',
            '/phuck/i',
            '/pussy/i',
            '/\bshit/i',
            '/vagina/i',
            '/wh0re/i',
            '/whore/i',
        ];

        /*
         * blow(\s)?job, goddamn
         **/

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $string)) {
                return true;
            }
        }

        return false;
    }
}
