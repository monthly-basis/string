<?php
namespace LeoGalleguillos\String;

use LeoGalleguillos\String\Model\Factory\View\Helper\Escape as EscapeHelperFactory;
use LeoGalleguillos\String\Model\Service\UrlFriendly as UrlFriendlyService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'factories' => [
                    'escape' => EscapeHelperFactory::class,
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                UrlFriendlyService::class => function ($serviceManager) {
                    return new UrlFriendlyService();
                },
            ],
        ];
    }
}
