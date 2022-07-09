<?php
namespace MonthlyBasis\String\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use MonthlyBasis\String\Model\Service as StringService;

class StartsWith extends AbstractHelper
{
    public function __construct(
        StringService\StartsWith $startsWithService
    ) {
        $this->startsWithService = $startsWithService;
    }

    public function __invoke(
        string $haystack,
        string $needle
    ): bool {
        return $this->startsWithService->startsWith(
            $haystack,
            $needle,
        );
    }
}
