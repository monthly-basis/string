<?php
namespace MonthlyBasis\String\Model\Entity\Config;

use MonthlyBasis\String\Model\Entity as StringEntity;

class UrlFriendly
{
    protected $convertToLowercase = true;

    public function getConvertToLowercase(): bool
    {
        return $this->convertToLowercase;
    }

    public function setConvertToLowercase(
        bool $convertToLowercase
    ): StringEntity\Config\UrlFriendly {
        $this->convertToLowercase = $convertToLowercase;
        return $this;
    }
}
