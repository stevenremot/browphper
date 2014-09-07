<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Browphper\Console\Command;
use Browphper\Console\Command\ReceiverInterface as CommandReceiverInterface;

class EchoReceiver implements CommandReceiverInterface
{
    public function processCommand(Command $command)
    {
        $parser = new Browphper\SymbolLocation\SymbolDescriptorParser();
        $descriptor = $parser->parse($command->getArguments()[0]);
        $locator = new Browphper\SymbolLocation\Locator();
        $locator->locate($descriptor)
            ->ifHasValue('var_dump')
            ->ifNull(function () { echo 'No result' . PHP_EOL; });
    }

    public function exitAsked(Command $command)
    {
        return false;
    }
}

$dispatcher = new Browphper\Console\Command\Dispatcher(
    array(
        'locate' => new Browphper\SymbolLocation\CommandReceiver,
        'exit' => new Browphper\Console\Command\ExitReceiver
    )
);

$inputListener = new Browphper\Console\Command\InputListener($dispatcher);

$reader = new Browphper\Console\Reader(new Browphper\Stream\Stdin(), $inputListener);
$reader->start();
