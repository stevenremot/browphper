<?php
namespace Browphper\SymbolLocation;

use Browphper\Console\Command;
use Browphper\Console\Command\ReceiverInterface;

/**
 * Command receiver for location queries
 *
 * It prints the result by either sending "null", or a json string
 * like this :
 *   {
 *     "file": "/path/to/file/name",
 *     "line": lineNumber
 *   }
 */
class CommandReceiver implements ReceiverInterface
{
    /**
     * @var SymbolDescriptorParser
     */
    private $parser = null;

    /**
     * @var Locator
     */
    private $locator = null;

    public function processCommand(Command $command)
    {
        if (empty($command->getArguments())) {
            throw new Exception('No argument provided.');
        }

        $symbol = $command->getArguments()[0];
        $descriptor = $this->getSymbolDescriptorParser()->parse($symbol);

        $this->getLocator()->locate($descriptor)
            ->ifHasValue(
                function (Location $location) {
                    $this->printLocation($location);
                }
            )
            ->ifNull(
                function () {
                    echo 'null' . PHP_EOL;
                }
            );
    }

    private function printLocation(Location $location)
    {
        echo json_encode(
            array(
                'file' => $location->getFileName(),
                'line' => $location->getLineNumber()
            )
        ) . PHP_EOL;
    }

    public function exitAsked(Command $command)
    {
        return false;
    }

    public function setSymbolDescriptorParser(SymbolDescriptorParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Return the symbol descriptor parser.
     *
     * If no parser has been set, create a new one.
     *
     * @return SymbolDescriptorParser
     */
    public function getSymbolDescriptorParser()
    {
        if (is_null($this->parser)) {
            $this->parser = new SymbolDescriptorParser();
        }
        return $this->parser;
    }

    public function setLocator(Locator $locator)
    {
        $this->locator = $locator;
    }

    /**
     * Return the symbol locator.
     *
     * If no locator has been set, create a new one.
     *
     * @return Locator
     */
    public function getLocator()
    {
        if (is_null($this->locator)) {
            $this->locator = new Locator();
        }
        return $this->locator;
    }
}
