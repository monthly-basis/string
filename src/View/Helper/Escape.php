<?php
namespace LeoGalleguillos\String\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Escape extends AbstractHelper
{
    /**
     * Invoke.
     *
     * @param string $string
     * @return string
     */
    public function __invoke(string $string) : string
    {
        return htmlspecialchars($string, ENT_SUBSTITUTE | ENT_DISALLOWED);
    }
}
