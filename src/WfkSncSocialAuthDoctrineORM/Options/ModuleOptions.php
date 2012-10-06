<?php

namespace WfkSncSocialAuthDoctrineORM\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $userProviderEntityClass = 'ScnSocialAuth\Entity\UserProvider';

    /**
     * @return string
     */
    public function getUserProviderEntityClass()
    {
        return $this->userProviderEntityClass;
    }

    /**
     * @param string $userProviderEntityClass
     */
    public function setUserProviderEntityClass($userProviderEntityClass)
    {
        $this->userProviderEntityClass = $userProviderEntityClass;
    }
}
