<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class EscapeTest extends TestCase
{
    protected function setUp(): void
    {
        $this->escapeService = new StringService\Escape();
    }

    public function test_escape()
    {
        $this->assertSame(
            'test',
            $this->escapeService->escape('test')
        );

        $string = '<html &>';
        $this->assertSame(
            '&lt;html &amp;&gt;',
            $this->escapeService->escape($string)
        );

        $string = '">attempt injection after attribute';
        $this->assertSame(
            '&quot;&gt;attempt injection after attribute',
            $this->escapeService->escape($string)
        );

        $this->assertSame(
            '',
            $this->escapeService->escape(null)
        );
    }
}
