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
             * Test string to trigger bad word detectors in production
             * for users who should not have to type a bad word.
             */
            '/1jdl95qa/',

            /*
             * Cannot use word boundary (\b) around dollar sign because
             * dollar sign is not a word character.
             * So, just hard-code some variations for now.
             */
            '/\ba\s*s\s*s\b/i',
            '/\bazz\b/i',
            '/a(s|\$)\$/i',
            '/a\$(s|\$)/i',
            '/a\*\*/i',
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
            '/d(i|!)ck/i',
            '/dumbass/i',
            '/fag/i',
            '/fap/i',

            '/\bf[^\w\=\/]+k/i',
            '/\bf\W+ck/i',
            '/\bf\W*a\W*g\b/i',
            '/\bfuk\b/i',

            '/f\W*u\W*c\W*k/i',
            '/\bf\W*c\W*k\b/i',
            '/\bf off\b/i',
            '/jackass/i',
            '/masturbat/i',
            '/n\W*(1|i|l)\W*g\W*g/i',
            '/orgasm/i',
            '/penis/i',
            '/phuck/i',
            '/porn/i',
            '/p\s*u\s*s\s*s\s*y/i',
            '/\bs\W*h(\W*i\W*|\W+)t/i',
            '/slut/i',
            '/suck my/i',
            '/vagina/i',
            '/wh0re/i',
            '/whore/i',
        ];

        /*
         * \bass\b, blow(\s)?job, goddamn
         **/
    }
}
