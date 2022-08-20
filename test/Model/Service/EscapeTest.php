<?php
declare(strict_types=1);

namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;
use TypeError;

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
    }

    public function test_escape_int_string()
    {
        $this->assertSame(
            $this->escapeService->escape(2020),
            '2020',
        );
    }

    public function test_escape_null_string()
    {
        $this->assertSame(
            '',
            $this->escapeService->escape(null)
        );
    }
}
