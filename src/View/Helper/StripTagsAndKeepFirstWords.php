<?php
namespace MonthlyBasis\String\View\Helper;

use MonthlyBasis\String\Model\Service as StringService;
use Laminas\View\Helper\AbstractHelper;

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
