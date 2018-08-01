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
                ],
                'factories' => [
                    StringHelper\Escape::class => function ($serviceManager) {
                        return new StringHelper\Escape();
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
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                StringService\EndsWith::class => function ($serviceManager) {
                    return new StringService\EndsWith();
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
