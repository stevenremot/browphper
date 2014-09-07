<?php
namespace Browphper\Console\Command;

use Browphper\Console\Command;

/**
 * Class in charge of providing the right command receive according to
 * the command.
 */
class Dispatcher
{
    /**
     * @param array
     */
    private $receivers = array();

    /**
     * $receivers is an associative array which keys are command
     * names, and values are Command listeners to call for each
     * command name.
     *
     * @param array $receivers
     */
    public function __construct(array $receivers)
    {
        $this->receivers = $receivers;
    }

    /**
     * Return receiver that can handle $command.
     *
     * Throw an exception if there is not such receiver.
     *
     * @param Command $command
     *
     * @return CommandReceiverInterface
     */
    public function getReceiverForCommand(Command $command)
    {
        $name = $command->getName();

        if(!array_key_exists($name, $this->receivers)) {
            throw new \Exception('No receivers for command "' . $name . '"');
        }

        return $this->receivers[$name];
    }
}
