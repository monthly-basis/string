<?php
namespace LeoGalleguillos\String\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use Zend\View\Helper\AbstractHelper;

class StripTagsAndKeepFirstWords extends AbstractHelper
{
    public function __construct(
        StringService\StripTagsAndKeepFirstWords $stripTagsAndKeepFirstWordsService
    ) {
        $this->stripTagsAndKeepFirstWordsService = $stripTagsAndKeepFirstWordsService;
    }

    public function __invoke(
        string $string,
        int $numberOfWords
    ) : string {
        return $this->stripTagsAndKeepFirstWordsService->stripTagsAndKeepFirstWords(
            $string,
            $numberOfWords
        );
    }
}
