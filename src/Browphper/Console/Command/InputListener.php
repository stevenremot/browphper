<?php
namespace Browphper\Console\Command;

use Browphper\Console\InputListenerInterface;

/**
 * In charge parsing and executing input command.
 */
class InputListener implements InputListenerInterface
{
    /**
     * Do not use it directly, use getParser() instead.
     *
     * @var Parser
     */
    private $parser = null;

    /**
     * @var Dispatcher
     */
    private $dispatcher = null;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function setParser(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Get the command parser.
     *
     * If no parser has been set, return the default one.
     *
     * @return Parser
     */
    public function getParser()
    {
        if (is_null($this->parser)) {
            $this->parser = new Parser();
        }
        return $this->parser;
    }

    public function processLine($line)
    {
        $command = $this->getParser()->parse($line);
        $receiver = $this->dispatcher->getReceiverForCommand($command);
        return $receiver->processCommand($command);
    }

    public function exitAsked($line)
    {
        $command = $this->getParser()->parse($line);
        $receiver = $this->dispatcher->getReceiverForCommand($command);
        return $receiver->exitAsked($command);
    }
}
