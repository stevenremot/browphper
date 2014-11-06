<?php
namespace Browphper\Lexer;

/**
 * Iterates over PHP tokens.
 */
class TokenIterator implements \Iterator
{
    /**
     * Raw iterator
     *
     * @var Iterator
     */
    private $tokenArrayIterator = null;

    /**
     * @param array $tokens output of token_get_all
     */
    public function __construct(array $tokens)
    {
        $this->tokenArrayIterator = new \ArrayIterator($tokens);
    }

    /**
     * @return Token
     */
    public function current()
    {
        $token = $this->tokenArrayIterator->current();

        return new Token(
            $token[0],
            $token[1],
            $token[2]
        );
    }

    public function key()
    {
        return $this->tokenArrayIterator->key();
    }

    public function next()
    {
        return $this->tokenArrayIterator->next();
    }

    public function rewind()
    {
        return $this->tokenArrayIterator->rewind();
    }

    public function valid()
    {
        return $this->tokenArrayIterator->valid();
    }
}
