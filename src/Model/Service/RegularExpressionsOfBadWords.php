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
class RegularExpressionsOfBadWords
{
    public function getRegularExpressionsOfBadWords(
    ): array {
        return [
            '/\bass\b/i',
            '/asshole/i',
            '/bastard/i',
            '/b1tch/i',
            '/bitch/i',
            '/\bboobs\b/i',
            '/bullshi?t/i',
            '/cock\s*suck/i',
            '/\bcum\b/i',
            '/cunt/i',
            '/dammit/i',
            '/damnit/i',
            '/dumbass/i',
            '/\bfag\b/i',
            '/\bfuk\b/i',
            '/fagg?ot/i',
            '/fap/i',
            '/f\s*\.?u\s*c\s*k/i',
            '/jackass/i',
            '/masturbat/i',
            '/my dick/i',
            '/n1gg/i',
            '/nigg/i',
            '/orgasm/i',
            '/penis/i',
            '/phuck/i',
            '/porn/i',
            '/p\s*u\s*s\s*s\s*y/i',
            '/\bshit/i',
            '/slut/i',
            '/suck( a)? dick/i',
            '/vagina/i',
            '/wh0re/i',
            '/whore/i',
        ];

        /*
         * \bass\b, blow(\s)?job, goddamn
         **/
    }
}
