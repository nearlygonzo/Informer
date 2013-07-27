<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Application',
                        'action'     => 'index',
                    ),
                ),
            ),

            'application' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/application[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Application',
                        'action'     => 'index',
                    ),
                ),
            ),

        ),
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
//        'aliases' => array(
//            // Aliasing a FQCN to a service name
//            'SomeModule\Model\User' => 'User',
//            // Aliasing a name to a known service name
//            'AdminUser' => 'User',
//            // Aliasing to an alias
//            'SuperUser' => 'AdminUser',
//        ),
//        'factories' => array(
//            // Keys are the service names.
//            // Valid values include names of classes implementing
//            // FactoryInterface, instances of classes implementing
//            // FactoryInterface, or any PHP callbacks
//            'User'     => 'SomeModule\Service\UserFactory',
//            'UserForm' => function ($serviceManager) {
//                $form = new SomeModule\Form\User();
//
//                // Retrieve a dependency from the service manager and inject it!
//                $form->setInputFilter($serviceManager->get('UserInputFilter'));
//                return $form;
//            },
//        ),
//        'invokables' => array(
//            // Keys are the service names
//            // Values are valid class names to instantiate.
//            'UserInputFiler' => 'SomeModule\InputFilter\User',
//        ),
//        'services' => array(
//            // Keys are the service names
//            // Values are objects
//            'Auth' => new SomeModule\Authentication\AuthenticationService(),
//        ),
//        'shared' => array(
//            // Usually, you'll only indicate services that should **NOT** be
//            // shared -- i.e., ones where you want a different instance
//            // every time.
//            'UserForm' => false,
//        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Application' => 'Application\Controller\ApplicationController',
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'application/index/index' => __DIR__ . '/../view/application/application/index.phtml',
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
