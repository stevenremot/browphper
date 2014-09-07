<?php
namespace Browphper\SymbolLocation;

/**
 * Parse a string into a symbol descriptor
 */
class SymbolDescriptorParser
{
    /**
     * Parse $input to return a symbol descriptor
     *
     * Throw an exception if it could not parse the string.
     *
     * @param string $input
     *
     * @return SymbolDescriptorInterface
     */
    public function parse($input)
    {
        $parts = explode('::', trim($input));
        if (empty($parts)) {
            throw new Exception('Could not get symbol from input "' . $input . '"');
        }

        $className = trim($parts[0]);
        $descriptor = new TypeDescriptor($className);

        if (count($parts) > 1) {
            $member = trim($parts[1]);
            if (strcmp(substr($member, -2), '()') === 0) {
                $descriptor = new MethodDescriptor(
                    $className,
                    substr($member, 0, count($member) - 3)
                );
            } else {
                $descriptor = new AttributeDescriptor(
                    $className,
                    $member
                );
            }
        }

        return $descriptor;
    }
}
