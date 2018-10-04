<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class StripTagsReplaceBadWordsAndShorten extends AbstractHelper
{
    public function __construct(
        StringService\StripTagsReplaceBadWordsAndShorten $stripTagsReplaceBadWordsAndShortenService
    ) {
        $this->stripTagsReplaceBadWordsAndShortenService = $stripTagsReplaceBadWordsAndShortenService;
    }

    public function __invoke(
        string $string,
        int $maxLength
    ) : string {
        return $this->stripTagsReplaceBadWordsAndShortenService->stripTagsReplaceBadWordsAndShorten(
            $string,
            $maxLength
        );
    }
}
