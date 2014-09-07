<?php
namespace Browphper\Stream;

/**
 * Provide characters from the standard input stream.
 */
class Stdin extends ReadFile
{
    public function __construct()
    {
        parent::__construct(STDIN);
    }
}
