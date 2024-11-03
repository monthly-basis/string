<?php
namespace MonthlyBasis\StringTest\Model\Service\Contains;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class LatexTest extends TestCase
{
    protected function setUp(): void
    {
        $this->containsLatexService = new StringService\Contains\Latex();
    }

    public function test_containsLatex()
    {
        $this->assertFalse(
            $this->containsLatexService->containsLatex(
                '',
            )
        );

        $this->assertFalse(
            $this->containsLatexService->containsLatex(
                'hello world',
            )
        );

        $this->assertFalse(
            $this->containsLatexService->containsLatex(
                '( text with just parenthesis )',
            )
        );

        $this->assertTrue(
            $this->containsLatexService->containsLatex(
                '\\( 410\\sqrt{2} \\)',
            )
        );

        $this->assertFalse(
            $this->containsLatexService->containsLatex(
                '[ text with just brackets ]',
            )
        );

        $string = "\\[\n\\frac{410\\sqrt{2}}{410\\sqrt{2}} = 1\n\\]";
        $this->assertTrue(
            $this->containsLatexService->containsLatex(
                $string,
            )
        );
    }
}
