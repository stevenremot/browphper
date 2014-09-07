<?php
namespace Browphper\Stream;

/**
 * Interface for classes that can take string as entry.
 */
interface WriteInterface
{
    /**
     * Write data at the end of the stream
     *
     * @param {string} $string
     *
     * @return void
     */
    public function write($string);
}
