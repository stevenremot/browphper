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
     * @param string $input
     *
     * @return void
     */
    public function processLine($line);

    /**
     * Return whether this line asks exit or not.
     */
    public function exitAsked($line);
}
