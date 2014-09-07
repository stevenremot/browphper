<?php
namespace Browphper\Core;

/**
 * Class encapsulating a value or none
 *
 * This class can be used in functions that can return a value or
 * null, to avoid operating on null.
 */
class Maybe
{
    /**
     * @var mixed
     */
    private $value = null;

    /**
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * Execute $callback if the Maybe encapsulates a value.
     *
     * $callback is a callable that takes encapsulated value as
     * argument.
     *
     * @param callable $callback
     *
     * @return Maybe
     */
    public function ifHasValue(callable $callback)
    {
        if (!is_null($this->value)) {
            call_user_func($callback, $this->value);
        }
        return $this;
    }

    /**
     *Execute $callback if the Maybe does not encapsulate any value.
     *
     * $callback is a callable that takes no arguments.
     *
     * @param callable $callback
     *
     * @return Maybe
     */
    public function ifNull(callable $callback)
    {
        if (is_null($this->value)) {
            call_user_func($callback);
        }
        return $this;
    }
}
