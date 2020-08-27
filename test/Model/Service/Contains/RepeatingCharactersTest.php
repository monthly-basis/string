<?php
namespace LeoGalleguillos\StringTest\Model\Service\Contains;

use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class RepeatingCharactersTest extends TestCase
{
    protected function setUp(): void
    {
        $config = require_once($_SERVER['PWD'] . '/config/autoload/local.php');

        $this->containsRepeatingCharactersService = new StringService\Contains\RepeatingCharacters(
            $config['string']['contains-repeating-characters']
        );
    }

    public function testContainsRepeatingCharacters()
    {
        // 1 character
        $this->assertFalse(
            $this->containsRepeatingCharactersService->containsRepeatingCharacters('abbccccddd')
        );
        $this->assertTrue(
            $this->containsRepeatingCharactersService->containsRepeatingCharacters('abbcccccddd')
        );
    }
}
