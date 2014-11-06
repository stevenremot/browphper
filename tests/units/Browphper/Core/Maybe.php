<?php
namespace Browphper\tests\units\Core;

use \mageekguy\atoum;

class Maybe extends atoum\test
{
    public function testNullValue()
    {
        $this
            ->object($this->newTestedInstance(null))
            ->isInstanceOf('Browphper\Core\Maybe');

        $executed = false;
        $this->testedInstance->ifHasValue(
            function () use (&$executed) {
                $executed = true;
            }
        );

        $this
            ->boolean($executed)
            ->isFalse();

        $executed = false;

        $this->testedInstance->ifNull(
            function () use (&$executed) {
                $executed = true;
            }
        );

        $this
            ->boolean($executed)
            ->isTrue();
    }

    public function testHasValue()
    {
        $this
            ->object($this->newTestedInstance(5))
            ->isInstanceOf('Browphper\Core\Maybe');

        $executed = false;
        $value = 4;

        $this->testedInstance->ifHasValue(
            function ($data) use (&$executed, &$value) {
                $executed = true;
                $value = $data;
            }
        );

        $this
            ->boolean($executed)
            ->isTrue();

        $this
            ->integer($value)
            ->isEqualTo(5);


        $executed = false;

        $this->testedInstance->ifNull(
            function () use (&$executed) {
                $executed = true;
            }
        );

        $this
            ->boolean($executed)
            ->isFalse();
    }
}
