<?php
namespace Brophper\Stream;

/**
 * Appends text in a file.
 */
class WriteFile implements WriteInterface
{
    /**
     * @var resource
     */
    private $file = null;

    /**
     * @param string|resource $fileName
     */
    public function __construct($fileName)
    {
        $this->file = is_resource($fileName) ?
            $fileName :
            fopen($fileName, 'a');
    }

    public function write($string)
    {
        fwrite($this->file, $string);
    }
}
