<?php
namespace MonthlyBasis\String\Model\Factory\Config;

use MonthlyBasis\String\Model\Entity as StringEntity;

class UrlFriendly
{
    public function buildFromArray(array $array)
    {
        $urlFriendlyEntity = new StringEntity\Config\UrlFriendly();

        if (isset($array['convert_to_lowercase'])) {
            $urlFriendlyEntity->setConvertToLowercase(
                $array['convert_to_lowercase']
            );
        }

        return $urlFriendlyEntity;
    }
}
