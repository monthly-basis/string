<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class ContainsBadWords extends AbstractHelper
{
    public function __construct(
        StringService\ContainsBadWords $containsBadWordsService
    ) {
        $this->containsBadWordsService = $containsBadWordsService;
    }

    public function __invoke(string $string): string
    {
        return $this->containsBadWordsService->containsBadWords($string);
    }
}
