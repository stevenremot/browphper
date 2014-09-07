<?php
namespace Browphper\Console\Command;

use Browphper\Console\Command;

/**
 * Interface for classes that can handle specific commands.
 */
interface ReceiverInterface
{
    /**
     * Execute code according to $command name and arguments.
     *
     * @param Command $command
     *
     * @return void
     */
    public function processCommand(Command $command);

    /**
     * Return whether user asked exit or not
     *
     * @param Command $command
     *
     * @return boolean
     */
    public function exitAsked(Command $command);
}
