<?php

namespace Market;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Market\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'market' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/market',
                    'defaults' => array(
                        'controller' => 'Market\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'slash' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => 'Market\Controller\Index',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'view' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/view',
                            'constraints' => array(),
                            'defaults' => array(
                                'controller' => 'market-view-controller',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'main' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/main[/:category]',
                                    'constraints' => array(),
                                    'defaults' => array(
                                        'action' => 'index'
                                    ),
                                ),
                            ),
                            'item' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/item[/:itemId]',
                                    'constraints' => array(
                                        'itemId' => '\d*'
                                    ),
                                    'defaults' => array(
                                        'action' => 'item'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'post' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/post',
                            'constraints' => array(),
                            'defaults' => array(
                                'controller' => 'market-post-Controller',
                                'action' => 'index'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'general-adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'market-post-form' => Factory\PostFormFactory::class,
            'market-post-filter' => Factory\PostFilterFactory::class,
            'listings-table' => Factory\ListingsTableFactory::class,
        ),
        'services' => array(
            'market-expire-days' => array(
                5, 10, 15, 20, 25, 30
            ),
            'market-captcha-options' => array(
                'font' => 'data/fonts/arial.ttf',
                'width' => 250,
                'height' => 100,
                'dotNoiseLevel' => 40,
                'lineNoiseLevel' => 3,
                'imgDir' => 'public/captcha',
                'imgUrl' => '/captcha'
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        ),
        'factories' => array(
            'Market\Controller\Index' => Factory\IndexControllerFactory::class,
            'market-post-controller' => Factory\PostControllerFactory::class,
            'market-view-controller' => Factory\ViewControllerFactory::class,
        ),
        'aliases' => array(
            'alt' => 'market-view-controller',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'market/index/index' => __DIR__ . '/../view/market/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
