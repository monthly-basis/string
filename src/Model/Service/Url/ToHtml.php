<?php
namespace LeoGalleguillos\String\Model\Service\Url;

use LeoGalleguillos\String\Model\Service as StringService;

class ToHtml
{
    public function __construct(
        StringService\Escape $escapeService
    ) {
        $this->escapeService = $escapeService;
    }

    public function toHtml(string $url): string
    {
        $url = html_entity_decode($url);

        $localDomains = [
            'jiskha.com',
            'www.jiskha.com',
        ];

        $parseUrlArray = parse_url($url);
        $urlEscaped    = $this->escapeService->escape($url);

        if (in_array($parseUrlArray['host'], $localDomains)) {
            return "<a href=\"$urlEscaped\">$urlEscaped</a>";
        }

        if (($parseUrlArray['host'] == 'www.google.com')
            && isset($parseUrlArray['path'])
            && ($parseUrlArray['path'] == '/search')
        ) {
            parse_str($parseUrlArray['query'], $queryStringArray);
            if (isset($queryStringArray['q'])) {
                $urlEscaped = 'https://www.google.com/search?q=' . urlencode($queryStringArray['q']);
            }
        }

        return "<a href=\"$urlEscaped\" target=\"_blank\" rel=\"nofollow external noopener\">$urlEscaped</a>";
    }
}
