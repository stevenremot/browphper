<?php
namespace Browphper\SymbolLocation;

/**
 * Interface for classes that fully describe a symbol.
 */
interface SymbolDescriptorInterface
{
    /**
     * Execute callback only for a type descriptor.
     *
     * A type if either a class, an interface or a trait
     *
     * $callback is a callable that takes the full type name as parameter.
     *
     * @param callable $callback
     *
     * @return SymbolDescriptorInterface
     */
    public function ifType(callable $callback);

    /**
     * Execute callback only for a method descriptor
     *
     * $callback is a callable that takes the full parent type name
     * and the method name as parameter.
     *
     * @param callable $callback
     *
     * @return SymbolDescriptorInterface
     */
    public function ifMethod(callable $callback);

    /**
     * Execute callback only for an attribute descriptor.
     *
     * $callback is a callable that takes the full parent type name
     * and the attribute name as parameter.
     *
     * @param callable $callback
     *
     * @return SymbolDescriptorInterface
     */
    public function ifAttribute(callable $callback);
}
