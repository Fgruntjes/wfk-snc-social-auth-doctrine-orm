<?php

namespace WfkSncSocialAuthDoctrineORM\Mapper;

use Doctrine\ORM\EntityManager;
use ScnSocialAuth\Mapper\UserProviderInterface;
use WfkSncSocialAuthDoctrineORM\Options\ModuleOptions;

class UserProvider implements UserProviderInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \ZfcUserDoctrineORM\Options\ModuleOptions
     */
    protected $options;

    /**
     * @var object
     */
    protected $entityPrototype;

    /**
     * @param EntityManager $em
     * @param ModuleOptions $options
     */
    public function __construct(EntityManager $em, ModuleOptions $options)
    {
        $this->em      = $em;
        $this->options = $options;
    }

    /**
     * @return object
     */
    public function getEntityPrototype()
    {
        if ($this->entityPrototype === null)
        {
            $entityType = $this->options->getUserProviderEntityClass();
            $this->entityPrototype = new $entityType;
        }
        return $this->entityPrototype;
    }

    /**
     * @param $providerId
     * @param $provider
     * @return object|null
     */
    public function findUserByProviderId($providerId, $provider)
    {
        $select = $this->em->createQueryBuilder()
            ->from($this->options->getUserProviderEntityClass(), 'e')
            ->select('e')
            ->andWhere('e.providerId = ?1')
            ->andWhere('e.provider = ?2')
            ->setParameter(1, $providerId)
            ->setParameter(2, $provider)
            ->setMaxResults(1);

        try
        {
            return $select->getQuery()->getSingleResult();
        }
        catch(\Doctrine\ORM\NoResultException $exception)
        {
            return null;
        }
    }

    /**
     * @param object $entity
     */
    public function insert($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }
}