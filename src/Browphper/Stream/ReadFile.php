<?php
namespace Browphper\Stream;

/**
 * Provides characters from a file.
 */
class ReadFile implements ReadInterface
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
            fopen($fileName, 'r');
    }

    public function getChar()
    {
        return fgetc($this->file);
    }

    public function getLine()
    {
        $line = '';
        $lineFinished = false;

        while (!$lineFinished) {
            $currentChar = $this->getChar();
            if ($currentChar === PHP_EOL) {
                $lineFinished = true;
            } else {
                $line .= $currentChar;
            }
        }

        return $line;
    }
}
