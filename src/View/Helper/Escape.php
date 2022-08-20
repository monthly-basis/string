<?php
declare(strict_types=1);

namespace MonthlyBasis\String\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use MonthlyBasis\String\Model\Service as StringService;

class Escape extends AbstractHelper
{
    public function __construct(
        StringService\Escape $escapeService
    ) {
        $this->escapeService = $escapeService;
    }

    public function __invoke(string|int|null $string): string
    {
        return $this->escapeService->escape($string);
    }
}
