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
                    'escape'                             => StringHelper\Escape::class,
                    'getUrlFriendly'                     => StringHelper\UrlFriendly::class,
                    'shorten'                            => StringHelper\Shorten::class,
                    'stripTagsAndKeepFirstWords'         => StringHelper\StripTagsAndKeepFirstWords::class,
                    'stripTagsAndShorten'                => StringHelper\StripTagsAndShorten::class,
                ],
                'factories' => [
                    StringHelper\CleanUpSpaces::class => function ($sm) {
                        return new StringHelper\CleanUpSpaces(
                            $sm->get(StringService\CleanUpSpaces::class)
                        );
                    },
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
                /**
                 * @deprecated Use MonthlyBasis\ContentModeration\Model\Service\Replace\Spaces() instead.
                 */
                StringService\CleanUpSpaces::class => function ($sm) {
                    return new StringService\CleanUpSpaces();
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
