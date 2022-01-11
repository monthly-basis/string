<?php
namespace MonthlyBasis\String\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use Laminas\View\Helper\AbstractHelper;

class UrlFriendly extends AbstractHelper
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    public function __invoke(string $string): string
    {
        return $this->urlFriendlyService->getUrlFriendly($string);
    }
}
