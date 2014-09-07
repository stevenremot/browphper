<?php
namespace Browphper\Console;

/**
 * Data structure for commands
 *
 * A command is the parsed input from the program input stream.
 */
class Command
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var array
     */
    private $arguments = array();

    /**
     * @param string $name
     * @param array  $arguments
     */
    public function __construct($name, array $arguments)
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }

    /**
     * Return the command's name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return the command's arguments
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}
