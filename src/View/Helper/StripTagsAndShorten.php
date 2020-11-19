<?php
namespace MonthlyBasis\String\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class StripTagsAndShorten extends AbstractHelper
{
    public function __construct(
        StringService\StripTagsAndShorten $stripTagsAndShortenService
    ) {
        $this->stripTagsAndShortenService = $stripTagsAndShortenService;
    }

    public function __invoke(
        string $string,
        int $maxLength
    ) : string {
        return $this->stripTagsAndShortenService->stripTagsAndShorten(
            $string,
            $maxLength
        );
    }
}
