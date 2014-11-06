<?php
namespace Browphper\Lexer;

/**
 * A raw token returned by token_get_all.
 */
class Token
{
    /**
     * First element of token_get_all items.
     *
     * @var integer
     */
    private $type = 0;

    /**
     * Second element of token_get_all items.
     *
     * @var string
     */
    private $value = '';

    /**
     * Third element of token_get_all items.
     */
    private $lineNumber = 0;

    /**
     * 
     * @param integer $type
     * @param string  $value
     * @param integer $lineNumber
     */
    public function __construct($type, $value, $lineNumber)
    {
        assert('is_int($type)');
        assert('is_string($value)');
        assert('is_int($lineNumber)');

        $this->type = $type;
        $this->value = $value;
        $this->lineNumber = $lineNumber;
    }

    /**
     * Return true if the token's type is $type.
     *
     * $type must be an integral constant representing a PHP token.
     *
     * @param integer $type
     *
     * @return boolean
     */
    public function isType($type)
    {
        return $this->type === $type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return integer
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }
}
