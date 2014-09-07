<?php
namespace Browphper\Console\Command;

use Browphper\Console\Command;

/**
 * Parse a string into a command.
 */
class Parser
{
    /**
     * Parse a line into a Command
     *
     * Throw an exception if it could not parse command.
     *
     * @param string $line
     *
     * @return Command
     */
    public function parse($line)
    {
        $parts = explode(' ', trim($line));

        if (empty($parts)) {
            throw new \Exception('Could not parse input "' . $line . '" : no command found.');
        }

        $name = $parts[0];
        $partsTail = array_slice($parts, 1);
        $arguments = array();
        foreach ($partsTail as $part) {
            $arg = trim($part);

            if (!empty($arg)) {
                $arguments[] = $arg;
            }
        }

        return new Command($name, $arguments);
    }
}
