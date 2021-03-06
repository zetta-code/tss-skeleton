<?php
/**
 * @link      http://github.com/zetta-repo/tss-skeleton for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

return [
    'navigation' => [
        'default' => [
            [
                'label' => _('Home'),
                'route' => 'home',
                'resource' => 'Application\Controller\Index',
                'privilege' => 'index',
            ],
            [
                'label' => '<span class="fa fa-user fa-lg"></span> <b class="caret"></b>',
                'uri' => ' ',
                'attribs' => ['data-toggle' => 'dropdown'],
                'wrapClass' => 'dropdown',
                'class' => 'dropdown-toggle',
                'ulClass' => 'dropdown-menu',
                'resource' => 'Zetta\ZendAuthentication\Menu',
                'privilege' => 'account',
                'pages' => [
                    [
                        'label' => _('Profile'),
                        'addon-left' => '<i class="fa fa-user fa-fw"></i> ',
                        'route' => 'authentication/default',
                        'controller' => 'account',
                        'resource' => 'Zetta\ZendAuthentication\Controller\Account',
                        'privilege' => 'index',
                    ],
                    [
                        'label' => _('Sign out'),
                        'addon-left' => '<i class="fa fa-sign-out fa-fw"></i> ',
                        'route' => 'authentication/signout',
                        'resource' => 'Zetta\ZendAuthentication\Controller\Auth',
                        'privilege' => 'signout',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ],
    ],
];
