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
                    'getFirstSentence'           => StringHelper\Sentences\First::class,
                    'getUrlFriendly'             => StringHelper\UrlFriendly::class,
                    'shorten'                    => StringHelper\Shorten::class,
                    'startsWith'                 => StringHelper\StartsWith::class,
                    'stripTagsAndKeepFirstWords' => StringHelper\StripTagsAndKeepFirstWords::class,
                    'stripTagsAndShorten'        => StringHelper\StripTagsAndShorten::class,
                ],
                'factories' => [
                    StringHelper\Escape::class => function ($sm) {
                        return new StringHelper\Escape(
                            $sm->get(StringService\Escape::class)
                        );
                    },
                    StringHelper\Sentences\First::class => function ($sm) {
                        return new StringHelper\Sentences\First(
                            $sm->get(StringService\Sentences\First::class)
                        );
                    },
                    StringHelper\Shorten::class => function ($sm) {
                        return new StringHelper\Shorten(
                            $sm->get(StringService\Shorten::class)
                        );
                    },
                    StringHelper\StartsWith::class => function ($sm) {
                        return new StringHelper\StartsWith(
                            $sm->get(StringService\StartsWith::class)
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
                StringService\Random::class => function ($sm) {
                    return new StringService\Random();
                },
                StringService\Sentences::class => function ($sm) {
                    return new StringService\Sentences();
                },
                StringService\Sentences\First::class => function ($sm) {
                    return new StringService\Sentences\First(
                        $sm->get(StringService\Sentences::class),
                        $sm->get(StringService\Shorten::class),
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
                StringService\Url::class => function ($sm) {
                    return new StringService\Url();
                },
                StringService\Url\ToHtml::class => function ($sm) {
                    return new StringService\Url\ToHtml(
                        $sm->get(StringService\Escape::class)
                    );
                },
                StringService\UrlFriendly::class => function ($sm) {
                    $configEntity = $sm->get(StringFactory\Config\UrlFriendly::class)
                        ->buildFromArray($sm->get('Config')['url_friendly'] ?? []);
                    return new StringService\UrlFriendly(
                        $configEntity
                    );
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
