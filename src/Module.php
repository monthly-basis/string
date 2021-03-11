<?php
namespace MonthlyBasis\String;

use MonthlyBasis\String\Model\Factory as StringFactory;
use MonthlyBasis\String\Model\Service as StringService;
use MonthlyBasis\String\View\Helper as StringHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'escape'                     => StringHelper\Escape::class,
                    'getUrlFriendly'             => StringHelper\UrlFriendly::class,
                    'shorten'                    => StringHelper\Shorten::class,
                    'stripTagsAndKeepFirstWords' => StringHelper\StripTagsAndKeepFirstWords::class,
                    'stripTagsAndShorten'        => StringHelper\StripTagsAndShorten::class,
                ],
                'factories' => [
                    StringHelper\Escape::class => function ($sm) {
                        return new StringHelper\Escape(
                            $sm->get(StringService\Escape::class)
                        );
                    },
                    StringHelper\Shorten::class => function ($sm) {
                        return new StringHelper\Shorten(
                            $sm->get(StringService\Shorten::class)
                        );
                    },
                    StringHelper\StripTagsAndKeepFirstWords::class => function ($sm) {
                        return new StringHelper\StripTagsAndKeepFirstWords(
                            $sm->get(StringService\StripTagsAndKeepFirstWords::class)
                        );
                    },
                    StringHelper\StripTagsAndShorten::class => function ($sm) {
                        return new StringHelper\StripTagsAndShorten(
                            $sm->get(StringService\StripTagsAndShorten::class)
                        );
                    },
                    StringHelper\UrlFriendly::class => function ($sm) {
                        return new StringHelper\UrlFriendly(
                            $sm->get(StringService\UrlFriendly::class)
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
                StringFactory\Config\UrlFriendly::class => function ($sm) {
                    return new StringFactory\Config\UrlFriendly();
                },
                StringService\Contains\CaseInsensitive::class => function ($sm) {
                    return new StringService\Contains\CaseInsensitive();
                },
                StringService\EndsWith::class => function ($sm) {
                    return new StringService\EndsWith();
                },
                StringService\Escape::class => function ($sm) {
                    return new StringService\Escape();
                },
                StringService\KeepFirstWords::class => function ($sm) {
                    return new StringService\KeepFirstWords();
                },
                StringService\NGrams::class => function ($sm) {
                    return new StringService\NGrams();
                },
                StringService\NGrams\SortedByCount::class => function ($sm) {
                    return new StringService\NGrams\SortedByCount(
                        $sm->get(StringService\NGrams::class)
                    );
                },
                StringService\Shorten::class => function ($sm) {
                    return new StringService\Shorten();
                },
                StringService\StartsWith::class => function ($sm) {
                    return new StringService\StartsWith();
                },
                StringService\StripTagsAndKeepFirstWords::class => function ($sm) {
                    return new StringService\StripTagsAndKeepFirstWords();
                },
                StringService\StripTagsAndShorten::class => function ($sm) {
                    return new StringService\StripTagsAndShorten(
                        $sm->get(StringService\Shorten::class)
                    );
                },
                StringService\Url\ToHtml::class => function ($sm) {
                    return new StringService\Url\ToHtml(
                        $sm->get(StringService\Escape::class)
                    );
                },
                StringService\UrlFriendly::class => function ($sm) {
                    return new StringService\UrlFriendly();
                },
                StringService\Urls::class => function ($sm) {
                    return new StringService\Urls(
                        $sm->get(StringService\StartsWith::class)
                    );
                },
            ],
        ];
    }
}
