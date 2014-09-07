<?php
namespace Browphper\Console;

/**
 * Interface for objects that can process console input.
 */
interface InputListenerInterface
{
    /**
     * Process the new line input in the console
     *
     * Return false if repl must stop, true otherwise.
     *
     * @param string $input
     *
     * @return boolean
     */
    public function processLine($line);
}
