<?php
namespace Browphper\Program;

/**
 * Class in charge of finding and loading browphper configuration.
 *
 * Currently, configuration is only a setup file that is required.
 */
class ConfigLoader
{
    const CONF_FILE_NAME = '.browphper.php';
    
    /**
     * Find and run configuration and load it if any.
     *
     * Browse the given directory to search a browphper configuration file. If
     * it could not find one, try again in the parent directory until file
     * system root is reached.
     *
     * The configuration is a file named .browphper.php. It should be placed
     * at the root of the PHP Project.
     *
     * @param string $currentDirectory Current directory. Search begins from
     *                                 this path.
     *
     * @return boolean true if it could load a configuration
     */
    public function loadConfiguration($currentDirectory)
    {
        $continue = true;
        $directory = $currentDirectory;
        $confLoaded = false;

        while ($continue) {
            if ($this->isConfigFileInDir($directory)) {
                require $directory . DIRECTORY_SEPARATOR . self::CONF_FILE_NAME;
                $confLoaded = true;
                $continue = false;
            } else {
                $newDirectory = dirname($directory);
                if (strcmp($directory, $newDirectory) === 0) {
                    $continue = false;
                } else {
                    $directory = $newDirectory;
                }
            }
        }

        return $confLoaded;
    }

    private function isConfigFileInDir($directory)
    {
        return is_file($directory . DIRECTORY_SEPARATOR . self::CONF_FILE_NAME);
    }
}
