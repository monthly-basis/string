<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

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
    ) : string {
        return $this->shortenService->shorten(
            $string,
            $maxLength
        );
    }
}
