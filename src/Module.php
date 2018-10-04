<?php
namespace LeoGalleguillos\String;

use LeoGalleguillos\String\View\Helper as StringHelper;
use LeoGalleguillos\String\Model\Factory\View\Helper\Escape as EscapeHelperFactory;
use LeoGalleguillos\String\Model\Service as StringService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'escape'              => StringHelper\Escape::class,
                    'shorten' => StringHelper\Shorten::class,
                    'stripTagsAndKeepFirstWords' => StringHelper\StripTagsAndKeepFirstWords::class,
                    'stripTagsAndShorten' => StringHelper\StripTagsAndShorten::class,
                    'toHtml'              => StringHelper\ToHtml::class,
                ],
                'factories' => [
                    StringHelper\Escape::class => function ($serviceManager) {
                        return new StringHelper\Escape(
                            $serviceManager->get(StringService\Escape::class)
                        );
                    },
                    StringHelper\Shorten::class => function ($serviceManager) {
                        return new StringHelper\Shorten(
                            $serviceManager->get(StringService\Shorten::class)
                        );
                    },
                    StringHelper\StripTagsAndKeepFirstWords::class => function ($serviceManager) {
                        return new StringHelper\StripTagsAndKeepFirstWords(
                            $serviceManager->get(StringService\StripTagsAndKeepFirstWords::class)
                        );
                    },
                    StringHelper\StripTagsAndShorten::class => function ($serviceManager) {
                        return new StringHelper\StripTagsAndShorten(
                            $serviceManager->get(StringService\StripTagsAndShorten::class)
                        );
                    },
                    StringHelper\ToHtml::class => function ($serviceManager) {
                        return new StringHelper\ToHtml(
                            $serviceManager->get(StringService\ToHtml::class)
                        );
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                StringService\Contains\CaseInsensitive::class => function ($serviceManager) {
                    return new StringService\Contains\CaseInsensitive();
                },
                StringService\EndsWith::class => function ($serviceManager) {
                    return new StringService\EndsWith();
                },
                StringService\Escape::class => function ($serviceManager) {
                    return new StringService\Escape();
                },
                StringService\KeepFirstWords::class => function ($serviceManager) {
                    return new StringService\KeepFirstWords();
                },
                StringService\NGrams::class => function ($serviceManager) {
                    return new StringService\NGrams();
                },
                StringService\NGrams\SortedByCount::class => function ($serviceManager) {
                    return new StringService\NGrams\SortedByCount(
                        $serviceManager->get(StringService\NGrams::class)
                    );
                },
                StringService\ReplaceBadWords::class => function ($serviceManager) {
                    return new StringService\ReplaceBadWords(
                    );
                },
                StringService\Shorten::class => function ($serviceManager) {
                    return new StringService\Shorten();
                },
                StringService\StartsWith::class => function ($serviceManager) {
                    return new StringService\StartsWith();
                },
                StringService\StripTagsAndKeepFirstWords::class => function ($serviceManager) {
                    return new StringService\StripTagsAndKeepFirstWords();
                },
                StringService\StripTagsAndShorten::class => function ($serviceManager) {
                    return new StringService\StripTagsAndShorten();
                },
                StringService\StripTagsReplaceBadWordsAndShorten::class => function ($serviceManager) {
                    return new StringService\StripTagsReplaceBadWordsAndShorten(
                        $serviceManager->get(StringService\ReplaceBadWords::class)
                    );
                },
                StringService\ToHtml::class => function ($serviceManager) {
                    return new StringService\ToHtml(
                        $serviceManager->get(StringService\Escape::class)
                    );
                },
                StringService\UrlFriendly::class => function ($serviceManager) {
                    return new StringService\UrlFriendly();
                },
                StringService\Urls::class => function ($serviceManager) {
                    return new StringService\Urls(
                        $serviceManager->get(StringService\StartsWith::class)
                    );
                },
            ],
        ];
    }
}
