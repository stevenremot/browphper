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
     * Find an run configuration and load it if any.
     *
     * The configuration is a file names .browphper.php that must be
     * placed at the root of the project.
     *
     * @param string $currentDirectory
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
