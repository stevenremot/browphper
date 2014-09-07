<?php
namespace Browphper\Console\Command;

use Browphper\Console\Command;

/**
 * Receiver that exits the program.
 */
class ExitReceiver implements ReceiverInterface
{
    public function processCommand(Command $command)
    {
    }

    public function exitAsked(Command $command)
    {
        return true;
    }
}
