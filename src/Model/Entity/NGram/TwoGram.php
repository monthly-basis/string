<?php
namespace LeoGalleguillos\String\Model\Entity\NGram;

use LeoGalleguillos\String\Model\Entity as StringEntity;

class TwoGram
{
    protected $string1;
    protected $string2;

    public function setString1(
        string $string1
    ) : StringEntity\NGram\TwoGram {
        $this->string1 = $string1;
        return $this;
    }

    public function setString2(
        string $string2
    ) : StringEntity\NGram\TwoGram {
        $this->string2 = $string2;
        return $this;
    }
}
