<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(


    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            //'Admin\Controller\Video' => 'Admin\Controller\VideoController',
            'Admin\Controller\Product' => 'Admin\Controller\ProductController',

        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),

            'video' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/video[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Video',
                        'action' => 'index',
                    ),
                ),
            ),

            'product' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/product[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Product',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/admin' => __DIR__ . '/../view/layout/layout-admin.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
        ),
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
            'post' => __DIR__ . '/../view',
            'forumThread' => __DIR__ . '/../view',
        ),

        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'module_layouts' => array(
        'Admin' => 'layout/layout-admin',
    ),
    /*'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
         'module_layouts' => array(
            'Admin' => 'layout/layout-admin',
        ),
    ),*/
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);