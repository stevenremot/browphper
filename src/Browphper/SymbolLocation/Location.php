<?php
namespace Browphper\SymbolLocation;

class Location
{
    /**
     * @var string
     */
    private $fileName = '';

    /**
     * @var integer
     */
    private $line = 0;

    /**
     * @param string  $fileName
     * @param integer $line
     */
    public function __construct($fileName, $line)
    {
        $this->fileName = $fileName;
        $this->line = $line;
    }

    /**
     * Return location's file name
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Return location's line number
     *
     * @return integer
     */
    public function getLineNumber()
    {
        return $this->line;
    }
}
