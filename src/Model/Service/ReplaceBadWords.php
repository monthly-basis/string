<?php
namespace LeoGalleguillos\String\Model\Service;

/**
 * WARNING
 *
 * The following code contains extremely explicit language.
 *
 * We have written code to replace bad words posted by users with !@#$%^&.
 *
 * In order to ensure that this code is functioning properly,
 * we must use explicit language in our own code.
 *
 * Sorry.
 */
class ReplaceBadWords
{
    /**
     * Replace bad words.
     *
     * @param string $string
     * @return string
     */
    public function replaceBadWords(
        string $string
    ): string {
        $patterns = [
            '/\bass\b/i',
            '/asshole/i',
            '/bastard/i',
            '/b1tch/i',
            '/bitch/i',
            '/cocksucker/i',
            '/cunt/i',
            '/dammit/i',
            '/damnit/i',
            '/dumbass/i',
            '/\bfag\b/i',
            '/\bfuk\b/i',
            '/faggot/i',
            '/fuck/i',
            '/jackass/i',
            '/masturbat/i',
            '/my dick/i',
            '/nigg/i',
            '/orgasm/i',
            '/penis/i',
            '/phuck/i',
            '/pussy/i',
            '/shit/i',
            '/vagina/i',
            '/wh0re/i',
            '/whore/i',
        ];

        /*
         * \bass\b, blow(\s)?job, goddamn
         **/

        $replacement = '!@#$%^&';
        return preg_replace($patterns, $replacement, $string);
    }
}
