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

    public function test_shorten_withCodepoints()
    {
        // Invalid codepoints
        $string = "hello\x95\x95world we really need to shorten this string";
        $this->assertSame(
            'hello??world we really need to',
            $this->shortenService->shorten(
                $string,
                32
            )
        );

        // Invalid codepoint and character codepoint
        $string = "hello\x95\xe2\x82\xacworld we really need to shorten this string";
        $this->assertSame(
            'hello?€world we really need to',
            $this->shortenService->shorten(
                $string,
                32
            )
        );

        // Valid codepoint
        $string = "hello\xc2\x80world we really need to shorten this string";
        $this->assertSame(
            "hello\xc2\x80world we really need to",
            $this->shortenService->shorten(
                $string,
                32
            )
        );
    }
}
