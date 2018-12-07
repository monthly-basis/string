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
            /*
             * Cannot use word boundary (\b) around dollar sign because
             * dollar sign is not a word character.
             * So, just hard-code some variations for now.
             */
            '/\bass\b/i',
            '/a(s|\$)\$/i',
            '/a\$(s|\$)/i',
            '/@ss/i',
            '/@\$\$/i',

            '/asshole/i',
            '/bastard/i',
            '/b(1|l)tch/i',
            '/b\W*(i\W*)?t\W*c\W*h/i',
            '/\bboobs\b/i',
            '/bullshi?t/i',
            '/cock\s*suck/i',
            '/\bcum\b/i',
            '/cunt/i',
            '/dammit/i',
            '/damnit/i',
            '/dumbass/i',
            '/\bf\W*a\W*g\b/i',
            '/\bfuk\b/i',
            '/fag/i',
            '/fap/i',
            '/f\W*(u\W*)?c\W*k/i',
            '/jackass/i',
            '/masturbat/i',
            '/my dick/i',
            '/n(1|i|l)gg/i',
            '/orgasm/i',
            '/penis/i',
            '/phuck/i',
            '/porn/i',
            '/p\s*u\s*s\s*s\s*y/i',
            '/\bs\W*h(\W*i\W*|\W+)t/i',
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
