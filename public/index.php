<?php
//use Zend\Mvc\Service\ServiceManagerConfig;
//use Zend\ServiceManager\ServiceManager;

chdir(dirname(__DIR__));

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();

//$configuration = include 'config/application.config.php';
//$serviceManager = new ServiceManager(new ServiceManagerConfig());
//$serviceManager->setService('ApplicationConfig', $configuration);
//$serviceManager->get('ModuleManager')->loadModules();
//$application = $serviceManager->get('Application');
//$application->bootstrap();
//$response = $application->run();
//$response->send();