<?php
namespace Browphper\SymbolLocation;

use Browphper\Core\Maybe;

/**
 * Class in charge of returning position of a symbol.
 * @todo protect against fatal errors when class does not exists
 */
class Locator
{
    /**
     * Return the symbol location if any.
     *
     * @param SymbolDescriptorInterface $symbolDescriptor
     *
     * @return Maybe encapsulating the symbol location
     */
    public function locate(SymbolDescriptorInterface $symbolDescriptor)
    {
        $location = null;
        $symbolDescriptor
            ->ifType(
                function ($fullName) use (&$location) {
                    $location = $this->getTypeLocation($fullName);
                }
            )
            ->ifMethod(
                function ($className, $name) use (&$location) {
                    $location = $this->getMethodLocation($className, $name);
                }
            )
            ->ifAttribute(
                function ($className, $name) use (&$location) {
                    $location = $this->getAttributeLocation($className, $name);
                }
            );

        return new Maybe($location);
    }

    private function getTypeLocation($fullName)
    {
        try {
            $reflectionClass = new \ReflectionClass($fullName);
        } catch (\ReflectionException $e) {
            return null;
        }

        return new Location(
            $reflectionClass->getFileName(),
            $reflectionClass->getStartLine()
        );
    }

    private function getMethodLocation($className, $name)
    {
        try {
            $reflectionClass = new \ReflectionClass($className);
            $reflectionMethod = $reflectionClass->getMethod($name);
        } catch (\ReflectionException $e) {
            return null;
        }

        return new Location(
            $reflectionMethod->getFileName(),
            $reflectionMethod->getStartLine()
        );
    }

    private function getAttributeLocation($className, $name)
    {
        try {
            $reflectionClass = new \ReflectionClass($className);
            $reflectionAttribute = $reflectionClass->getProperty($name);
        } catch (\ReflectionException $e) {
            return null;
        }

        return new Location(
            $reflectionAttribute->getFileName(),
            $reflectionAttribute->getStartLine()
        );
    }
}
