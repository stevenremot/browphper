<?php
namespace Browphper\SymbolLocation;

/**
 * Descriptor for class methods
 */
class MethodDescriptor implements SymbolDescriptorInterface
{
    /**
     * @var string
     */
    private $className = '';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @param string $className
     * @param string $name
     */
    public function __construct($className, $name)
    {
        $this->className = $className;
        $this->name = $name;
    }

    public function ifType(callable $callback)
    {
        return $this;
    }

    public function ifMethod(callable $callback)
    {
        call_user_func($callback, $this->className,$this->name);
        return $this;
    }

    public function ifAttribute(callable $callback)
    {
        return $this;
    }
}
