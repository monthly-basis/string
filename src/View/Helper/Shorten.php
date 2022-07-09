<?php
namespace MonthlyBasis\String\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use MonthlyBasis\String\Model\Service as StringService;

class Shorten extends AbstractHelper
{
    public function __construct(
        StringService\Shorten $shortenService
    ) {
        $this->shortenService = $shortenService;
    }

    public function __invoke(
        string $string,
        int $maxLength
    ): string {
        return $this->shortenService->shorten(
            $string,
            $maxLength
        );
    }
}
