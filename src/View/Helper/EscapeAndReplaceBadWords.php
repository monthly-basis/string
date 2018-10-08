<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class EscapeAndReplaceBadWords extends AbstractHelper
{
    public function __construct(
        StringService\Escape $escapeService,
        StringService\ReplaceBadWords $replaceBadWordsService
    ) {
        $this->escapeService          = $escapeService;
        $this->replaceBadWordsService = $replaceBadWordsService;
    }

    /**
     * Invoke.
     *
     * @param string $string
     * @return string
     */
    public function __invoke(string $string): string
    {
        $stringEscaped = $this->escapeService->escape($string);
        return $this->replaceBadWordsService->replaceBadWords($stringEscaped);
    }
}
