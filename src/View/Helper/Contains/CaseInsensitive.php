<?php
namespace MonthlyBasis\String\View\Helper\Contains;

use Laminas\View\Helper\AbstractHelper;
use MonthlyBasis\String\Model\Service as StringService;

class CaseInsensitive extends AbstractHelper
{
    public function __construct(
        protected StringService\Contains\CaseInsensitive $caseInsensitiveService
    ) {
    }

    public function __invoke(
        string $haystack,
        string $needle
    ): bool {
        return $this->caseInsensitiveService->caseInsensitive(
            $haystack,
            $needle
        );
    }
}
