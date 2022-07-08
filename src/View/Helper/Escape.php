<?php
declare(strict_types=1);

namespace MonthlyBasis\String\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use Laminas\View\Helper\AbstractHelper;

class Escape extends AbstractHelper
{
    public function __construct(
        StringService\Escape $escapeService
    ) {
        $this->escapeService = $escapeService;
    }

    public function __invoke(string $string = null): string
    {
        return $this->escapeService->escape($string);
    }
}
