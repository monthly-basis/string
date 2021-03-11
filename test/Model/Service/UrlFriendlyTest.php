<?php
namespace MonthlyBasis\StringTest\Model\Service;

use MonthlyBasis\String\Model\Entity as StringEntity;
use MonthlyBasis\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class UrlFriendlyTest extends TestCase
{
    protected function setUp(): void
    {
        $this->urlFriendlyEntityMock = $this->createMock(
            StringEntity\Config\UrlFriendly::class
        );
        $this->urlFriendlyService = new StringService\UrlFriendly(
            $this->urlFriendlyEntityMock
        );
    }

    public function test_getUrlFriendly()
    {
        $this->assertSame(
            'test',
            $this->urlFriendlyService->getUrlFriendly('test')
        );

        $this->assertSame(
            'aint',
            $this->urlFriendlyService->getUrlFriendly(' ain’t')
        );

        $this->assertSame(
            'cant',
            $this->urlFriendlyService->getUrlFriendly('can\'t ')
        );

        $string = ' surrounding spaces & special characters! ';
        $this->assertSame(
            'surrounding-spaces-special-characters',
            $this->urlFriendlyService->getUrlFriendly($string)
        );

        $string = '\'-!@$!@$';
        $this->assertSame(
            '-',
            $this->urlFriendlyService->getUrlFriendly($string)
        );
    }

    public function test_getUrlFriendly_differentCases_differentResults()
    {
        $string = 'Capital word and <HTML> tag';

        $this->urlFriendlyEntityMock
            ->method('getConvertToLowercase')
            ->will(
                $this->onConsecutiveCalls(
                    true,
                    false
                )
            )
            ;

        $this->assertSame(
            'capital-word-and-html-tag',
            $this->urlFriendlyService->getUrlFriendly($string)
        );

        $this->assertSame(
            'Capital-word-and-HTML-tag',
            $this->urlFriendlyService->getUrlFriendly($string)
        );
    }
}
