<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;
use Zend\Session\Container;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        //$eventManager = $e->getApplication()->getEventManager();
        //$eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'authPreDispatch'),1);

        //$this -> initAcl($e);
        //$e -> getApplication() -> getEventManager() -> attach('route', array($this, 'checkAcl'));

        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach('dispatch', array($this, 'loadConfiguration' ));
        $eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            //var_dump($controller); exit;
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            //var_dump($moduleNamespace); exit;
            $config = $e->getApplication()->getServiceManager()->get('config');
            //echo '<pre>';var_dump($config);die;
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 100);
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function loadConfiguration(MvcEvent $e)
    {
        $user_session = new Container('user');
        $username = $user_session->name;
        $controller = $e->getTarget();
        $controller->layout()->name = $username;
    }
}
