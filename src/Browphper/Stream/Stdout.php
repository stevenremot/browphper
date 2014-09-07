<?php
namespace Browphper\Stream;

/**
 * Write characters in the standard output.
 */
class Stdout extends WriteFile
{
    public function __construct()
    {
        parent::__construct(STDOUT);
    }
}
