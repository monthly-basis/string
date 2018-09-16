<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class ToHtml extends AbstractHelper
{
    public function __construct(
        StringService\ToHtml $toHtmlService
    ) {
        $this->toHtmlService = $toHtmlService;
    }

    public function __invoke(string $string): string
    {
        return $this->toHtmlService->toHtml($string);
    }
}
