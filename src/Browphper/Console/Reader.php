<?php
namespace Browphper\Console;

use \Browphper\Stream\ReadInterface;

/**
 * In charge of reading inputs from the command line.
 *
 * Send input to an input listener.
 */
class Reader
{
    /**
     * @var ReadInterface
     */
    private $input = null;

    /**
     * @var InputListenerInterface
     */
    private $inputListener = null;

    public function __construct(ReadInterface $input, InputListenerInterface $inputListener)
    {
        $this->input = $input;
        $this->inputListener = $inputListener;
    }

    /**
     * Start the reading loop
     */
    public function start()
    {
        $continue = true;
        while ($continue) {
            $line = $this->input->getLine();
            $continue = $this->inputListener->processLine($line);
        }
    }
}
