<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication\Hybrid\Resource\Doctrine;

use MSBios\ModuleInterface;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

/**
 * Class Module
 * @package MSBios\Authentication\Hybrid\Resource\Doctrine
 */
class Module implements
    ModuleInterface,
    AutoloaderProviderInterface
{
    /** @const VERSION */
    const VERSION = '1.0.1';

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            AutoloaderFactory::STANDARD_AUTOLOADER => [
                StandardAutoloader::LOAD_NS => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }
}
