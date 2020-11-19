<?php
namespace MonthlyBasis\String\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class Escape extends AbstractHelper
{
    public function __construct(
        StringService\Escape $escapeService
    ) {
        $this->escapeService = $escapeService;
    }

    /**
     * Invoke.
     *
     * @param string $string
     * @return string
     */
    public function __invoke(string $string) : string
    {
        return $this->escapeService->escape($string);
    }
}
