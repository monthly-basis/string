<?php
namespace LeoGalleguillos\String\Model\Service;

class Urls
{
    /**
     * Get URLs
     *
     * @param string $string
     * @return array
     */
    public function getUrls(
        string $string
    ) : array {
        $urls  = [];
        $words = preg_split('/\s+/', $string);


        return $urls;
    }
}
