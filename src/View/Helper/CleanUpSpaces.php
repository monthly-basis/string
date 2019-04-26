<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class CleanUpSpaces extends AbstractHelper
{
    public function __construct(
        StringService\CleanUpSpaces $cleanUpSpacesService
    ) {
        $this->cleanUpSpacesService = $cleanUpSpacesService;
    }

    public function __invoke(string $string): string
    {
        return $this->cleanUpSpacesService->cleanUpSpaces($string);
    }
}
