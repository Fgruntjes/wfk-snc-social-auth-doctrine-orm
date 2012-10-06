<?php
namespace WfkSncSocialAuthDoctrineORM;

use Zend\Mvc\ModuleRouteListener;
use Zend\Loader\StandardAutoloader;
use Zend\Loader\AutoloaderFactory;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface, ServiceProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'wfksncsocialauthdoctrineorm.entitymanager' => 'doctrine.entitymanager.orm_default',
            ),
            'factories' => array(
                'wfksncsocialauthdoctrineorm.module.options' => function ($sm) {
                    $config = $sm->get('Configuration');
                    return new Options\ModuleOptions(isset($config['wfksncsocialauthdoctrineorm']) ? $config['wfksncsocialauthdoctrineorm'] : array());
                },
            ),
        );
    }
}
