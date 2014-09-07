<?php
namespace Browphper\Stream;

/**
 * Interface for streams that provide characters
 */
interface ReadInterface
{
    /**
     * Return a single character from the string
     *
     * @return string
     */
    public function getChar();

    /**
     * Return a line from the stream
     *
     * @return string
     */
    public function getLine();
}
