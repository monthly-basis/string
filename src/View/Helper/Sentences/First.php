<?php
namespace MonthlyBasis\String\View\Helper\Sentences;

use Laminas\View\Helper\AbstractHelper;
use MonthlyBasis\String\Model\Service as StringService;

class First extends AbstractHelper
{
    public function __construct(
        StringService\Sentences\First $firstService
    ) {
        $this->firstService = $firstService;
    }

    public function __invoke(
        string $string,
        int $maxLength = 125
    ): string {
        return $this->firstService->getFirstSentences(
            $string,
            $maxLength
        );
    }
}
