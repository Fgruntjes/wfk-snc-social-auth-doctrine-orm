<?php
namespace WfkSncSocialAuthDoctrineORM\Service;

use WfkSncSocialAuthDoctrineORM\Mapper\UserProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @category   ScnSocialAuth
 * @package    ScnSocialAuth_Service
 */
class UserProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        /** @var $options \WfkSncSocialAuthDoctrineORM\Options\ModuleOptions */
        $options = $services->get('wfksncsocialauthdoctrineorm.module.options');
        /** @var $entityManager \Doctrine\ORM\EntityManager */
        $entityManager = $services->get('wfksncsocialauthdoctrineorm.entitymanager');

        return new UserProvider($entityManager, $options);
    }
}
