<?php
namespace LeoGalleguillos\StringTest\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class ShortenTest extends TestCase
{
    protected function setUp(): void
    {
        $this->shortenService = new StringService\Shorten();
    }

    public function test_shorten()
    {
        $string = 'hello world';
        $this->assertSame(
            'hello',
            $this->shortenService->shorten(
                $string,
                7
            )
        );
        $this->assertSame(
            'hello world',
            $this->shortenService->shorten(
                $string,
                11
            )
        );

        $string = '   Lorem ipsum   dolor sit  amet, consectetur adipiscing elit. ';
        $this->assertSame(
            'Lorem ipsum',
            $this->shortenService->shorten(
                $string,
                11
            )
        );
        $this->assertSame(
            'Lorem ipsum dolor sit amet,',
            $this->shortenService->shorten(
                $string,
                32
            )
        );

$string = <<<STRING
Welcome to the string with
awesome linebreaks. This is
just fantastic.
STRING;
        $this->assertSame(
            'Welcome to the string with awesome linebreaks. This is just',
            $this->shortenService->shorten(
                $string,
                64
            )
        );
    }

    /**
     * @todo Update shorten function so that it can handle:
     * - invalid UTF-8 characters
     * - invalid UTF-8 sequences / codepoints
     *
     * The string below contains an invalid UTF-8 codepoint, and therefore
     * shorten() returns an empty string, and the unit test fails.
     *
     * @see https://www.php.net/manual/en/reference.pcre.pattern.modifiers.php
     */
    public function test_shorten_invalidUtf8()
    {
        $string = urldecode('The+colony+Lord+Baltimore+established+in+Maryland+encouraged+Land+grants+for+every+settler+A+role+for+colonists+in+government+Religious+freedom+for+Roman+Catholic+%95%95+The+settlement+of+wealthy+people');
        $this->assertSame(
            'The colony Lord Baltimore established in Maryland encouraged Land',
            $this->shortenService->shorten(
                $string,
                64
            )
        );
    }
}
