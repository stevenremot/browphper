<?php
namespace Browphper\tests\units\Lexer;

use mageekguy\atoum;

class TokenIterator extends atoum\test
{
    public function testIteration()
    {
        $code = '<?php echo';

        $this
            ->object($this->newTestedInstance(token_get_all($code)))
            ->isInstanceOf('Browphper\Lexer\TokenIterator')

            ->object($token = $this->testedInstance->current())
            ->isInstanceOf('Browphper\Lexer\Token')

            ->boolean($token->isType(T_OPEN_TAG))
            ->isTrue()

            ->integer($token->getLineNumber())
            ->isEqualTo(1);

        $this->testedInstance->next();

        $this
            ->boolean($this->testedInstance->valid())
            ->isTrue()

            ->object($token = $this->testedinstance->current())
            ->isInstanceOf('Browphper\Lexer\Token')

            ->boolean($token->isType(T_ECHO))
            ->isTrue();

        $this->testedInstance->next();

        $this
            ->boolean($this->testedInstance->valid())
            ->isFalse();
    }
}
