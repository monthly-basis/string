<?php
namespace LeoGalleguillos\String\Model\Service;

use LeoGalleguillos\String\Model\Service as StringService;

class ToHtml
{
    public function __construct(
        StringService\Escape $escapeService
    ) {
        $this->escapeService = $escapeService;
    }

    public function toHtml(string $message): string
    {
        $messageEscaped = $this->escapeService->escape($message);

        $pattern = '|(https?://(?!(www\.)?jiskha\.com)[^\s]+)|i';
        $replacement = '<a href="$1" target="_blank" rel="external noopener">$1</a>';
        $messageEscaped = preg_replace($pattern, $replacement, $messageEscaped);

        $pattern = '|(https?://(?=(www\.)?jiskha\.com)[^\s]+)|i';
        $replacement = '<a href="$1">$1</a>';
        $messageEscaped = preg_replace($pattern, $replacement, $messageEscaped);

        $pattern        = '#&lt;(/?)(b|i|u|sub|sup)&gt;#i';
        $replacement    = '<$1$2>';
        $messageEscaped = preg_replace($pattern, $replacement, $messageEscaped);

        return nl2br($messageEscaped);
    }
}
