<?php
namespace Browphper\Program;

/**
 * Run the command line program.
 *
 * @todo refactor it
 */
class Main
{
    public function start()
    {
        $configLoader = new ConfigLoader();

        if (!$configLoader->loadConfiguration(getcwd())) {
            echo 'WARNING: could not find any configuration file.' . PHP_EOL;
        }

        $dispatcher = new \Browphper\Console\Command\Dispatcher(
            array(
                'locate' => new \Browphper\SymbolLocation\CommandReceiver,
                'exit' => new \Browphper\Console\Command\ExitReceiver
            )
        );

        $inputListener = new \Browphper\Console\Command\InputListener($dispatcher);

        $reader = new \Browphper\Console\Reader(new \Browphper\Stream\Stdin(), $inputListener);
        $reader->start();
    }
}
