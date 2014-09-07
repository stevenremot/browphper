<?php
namespace Browphper\SymbolLocation;

/**
 * Descriptor for types
 *
 * A type is either a class, an interface or a trait.
 */
class TypeDescriptor implements SymbolDescriptorInterface
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function ifType(callable $callback)
    {
        call_user_func($callback, $this->name);
        return $this;
    }

    public function ifMethod(callable $callback)
    {
        return $this;
    }

    public function ifAttribute(callable $callback)
    {
        return $this;
    }
}
