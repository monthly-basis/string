<?php
declare(strict_types=1);

namespace MonthlyBasis\StringTest\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use MonthlyBasis\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;
use TypeError;

class EscapeTest extends TestCase
{
    protected function setUp(): void
    {
        $this->escapeService = new StringService\Escape();
        $this->escapeHelper = new StringHelper\Escape(
            $this->escapeService
        );
    }

    public function test___invoke()
    {
        $this->assertSame(
            'test',
            $this->escapeHelper->__invoke('test')
        );

        $string = '<html &>';
        $this->assertSame(
            '&lt;html &amp;&gt;',
            $this->escapeHelper->__invoke($string)
        );

        $string = '">attempt injection after attribute';
        $this->assertSame(
            '&quot;&gt;attempt injection after attribute',
            $this->escapeHelper->__invoke($string)
        );

        try {
            $this->escapeHelper->__invoke(2020);
            $this->fail();
        } catch (TypeError $typeError) {
            $this->assertSame(
                'MonthlyBasis\String\View\Helper\Escape::__invoke(): Argument #1 ($string) must be of type ?string, int given',
                substr($typeError->getMessage(), 0, 108),
            );
        }

        $this->assertSame(
            '',
            $this->escapeHelper->__invoke(null)
        );
    }
}
