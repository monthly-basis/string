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
                    'cleanUpSpaces'                      => StringHelper\CleanUpSpaces::class,
                    'containsBadWords'                   => StringHelper\ContainsBadWords::class,
                    'escape'                             => StringHelper\Escape::class,
                    'escapeAndReplaceBadWords'           => StringHelper\EscapeAndReplaceBadWords::class,
                    'getUrlFriendly'                     => StringHelper\UrlFriendly::class,
                    'shorten'                            => StringHelper\Shorten::class,
                    'stripTagsAndKeepFirstWords'         => StringHelper\StripTagsAndKeepFirstWords::class,
                    'stripTagsAndShorten'                => StringHelper\StripTagsAndShorten::class,
                    'stripTagsReplaceBadWordsAndShorten' => StringHelper\StripTagsReplaceBadWordsAndShorten::class,
                    'toHtml'                             => StringHelper\ToHtml::class,
                ],
                'factories' => [
                    StringHelper\CleanUpSpaces::class => function ($sm) {
                        return new StringHelper\CleanUpSpaces(
                            $sm->get(StringService\CleanUpSpaces::class)
                        );
                    },
                    StringHelper\ContainsBadWords::class => function ($sm) {
                        return new StringHelper\ContainsBadWords(
                            $sm->get(StringService\ContainsBadWords::class)
                        );
                    },
                    StringHelper\Escape::class => function ($sm) {
                        return new StringHelper\Escape(
                            $sm->get(StringService\Escape::class)
                        );
                    },
                    StringHelper\EscapeAndReplaceBadWords::class => function ($sm) {
                        return new StringHelper\EscapeAndReplaceBadWords(
                            $sm->get(StringService\Escape::class),
                            $sm->get(StringService\ReplaceBadWords::class)
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
                    StringHelper\StripTagsReplaceBadWordsAndShorten::class => function ($sm) {
                        return new StringHelper\StripTagsReplaceBadWordsAndShorten(
                            $sm->get(StringService\StripTagsReplaceBadWordsAndShorten::class)
                        );
                    },
                    StringHelper\ToHtml::class => function ($sm) {
                        return new StringHelper\ToHtml(
                            $sm->get(StringService\ToHtml::class)
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
                StringService\CleanUpSpaces::class => function ($sm) {
                    return new StringService\CleanUpSpaces();
                },
                StringService\ContainsBadWords::class => function ($sm) {
                    return new StringService\ContainsBadWords(
                        $sm->get(StringService\RegularExpressionsOfBadWords::class)
                    );
                },
                StringService\ContainsImmatureWords::class => function ($sm) {
                    return new StringService\ContainsImmatureWords(
                        $sm->get(StringService\RegularExpressionsOfImmatureWords::class)
                    );
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
                StringService\RegularExpressionsOfBadWords::class => function ($sm) {
                    return new StringService\RegularExpressionsOfBadWords(
                    );
                },
                StringService\RegularExpressionsOfImmatureWords::class => function ($sm) {
                    return new StringService\RegularExpressionsOfImmatureWords(
                    );
                },
                StringService\ReplaceBadWords::class => function ($sm) {
                    return new StringService\ReplaceBadWords(
                        $sm->get(StringService\RegularExpressionsOfBadWords::class)
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
                    return new StringService\StripTagsAndShorten();
                },
                StringService\StripTagsReplaceBadWordsAndShorten::class => function ($sm) {
                    return new StringService\StripTagsReplaceBadWordsAndShorten(
                        $sm->get(StringService\ReplaceBadWords::class)
                    );
                },
                StringService\ToHtml::class => function ($sm) {
                    return new StringService\ToHtml(
                        $sm->get(StringService\Escape::class),
                        $sm->get(StringService\ReplaceBadWords::class)
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
