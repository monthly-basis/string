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
            '/asshole/i',
            '/bastard/i',
            '/bitch/i',
            '/cocksucker/i',
            '/cunt/i',
            '/dammit/i',
            '/damnit/i',
            '/fuck/i',
            '/jackass/i',
            '/masturbat/i',
            '/nigg/i',
            '/orgasm/i',
            '/penis/i',
            '/phuck/i',
            '/pussy/i',
            '/shit/i',
            '/vagina/i',
            '/whore/i',
        ];

        /*
         * ass, blow(\s)?job, dumb(\s)?ass, goddamn
         * */

        $replacement = '!@#$%^&';
        return preg_replace($patterns, $replacement, $string);
    }
}
