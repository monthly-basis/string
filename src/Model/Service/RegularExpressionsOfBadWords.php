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
            '/ozeybhv/',

            /*
             * Cannot use word boundary (\b) around dollar sign because
             * dollar sign is not a word character.
             * So, just hard-code some variations for now.
             */
            '/\ba\s*ss(es)?\b/i',
            '/\bazz\b/i',
            '/a(s|\$)\$/i',
            '/a\$(s|\$)/i',
            '/\ba\*\*/i',
            '/@ss/i',
            '/@\$\$/i',
            '/as(s|\W)hole/i',
            '/a§š/i',

            '/bastard/i',

            '/b(1|l)tch/i',
            '/b\W*(i\W*)?t\W*c\W*h/i',
            '/bi+(t|\W)?ch/i',
            '/bicth/i',
            '/bi\dch/i',
            '/b\*\*\*(\*|h)/i',

            '/\bboobs\b/i',
            '/bullshi?t/i',
            '/cock\s*suck/i',
            '/\bcum\b/i',

            '/c(\W|\_| )*(u|\W) ?n ?t/i',

            '/dammit/i',
            '/damnit/i',

            '/d\W?(i|!)(c|k)k\b/i',
            '/d[\!\#\*]{2}k/i',

            '/dumbass/i',
            '/dumba\W\W/i',
            '/f(a|4)g/i',
            '/fap/i',
            '/foreskin/i',

            '/\bf(###|\*\*\*|\-\-\-)/i',
            '/\bf[^\w\=\/ ]+k/i',
            '/\bf\W+ck/i',
            '/\bf\W*a\W*g\b/i',
            '/\bfu\W?k\b/i',
            '/fu\W?king?/i',
            '/f\W*(u|v)\W*c\W*k/i',
            '/\bf\W*c\W*k\b/i',
            '/\bf off\b/i',
            '/\bfuc/i',

            '/god ?damn/i',
            '/jigaboo/i',
            '/jackass/i',
            '/kike/i',
            '/masturbat/i',
            '/\bmilf\b/i',

            '/(n|ɴ)\W*(1|i|l|\!|\¡)\W*g\W*g/i',
            '/ni99/i',
            '/niglet/i',
            '/\bnig\b/i',

            '/orgasm/i',

            '/peni(s|5)/i',

            '/phuck/i',
            '/po(r|ɾ)n/i',

            '/p\s*u\s*s\s*s\s*y/i',
            '/p\W*u\W*s\W*s\W*y/i',

            '/\bs\W*h(\W*(i|1)\W*|\W+)t/i',

            '/s(l|1)(u|ü)t/i',
            '/suck my/i',

            '/\btits?\b/i',
            '/titties/i',

            '/vagina/i',
            '/wh0re/i',
            '/whore/i',
            '/xhamster/i',
            '/xvideos/i',
        ];

        /*
         * \bass\b, blow(\s)?job, goddamn
         **/
    }
}
