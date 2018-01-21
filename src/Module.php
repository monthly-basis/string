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
                    'escape' => StringHelper\Escape::class,
                ],
                'factories' => [
                    StringHelper\Escape::class => function ($serviceManager) {
                        return new StringHelper\Escape();
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                StringService\NGrams::class => function ($serviceManager) {
                    return new StringService\NGrams();
                },
                StringService\UrlFriendly::class => function ($serviceManager) {
                    return new StringService\UrlFriendly();
                },
            ],
        ];
    }
}
