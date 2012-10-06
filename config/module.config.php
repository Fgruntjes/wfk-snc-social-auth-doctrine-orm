<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'sncsocialauth_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/sncsocialauth',
            ),

            'orm_default' => array(
                'drivers' => array(
                    'ScnSocialAuth\Entity' => 'sncsocialauth_driver',
                )
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'ScnSocialAuth-UserProviderMapper' => 'WfkSncSocialAuthDoctrineORM\Service\UserProviderFactory',
        ),
    ),
);
