<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Admin\Model\Product;
use Admin\Model\ProductTable;
use Admin\Model\ProductBody;
use Admin\Model\ProductBodyTable;
use Admin\Model\ProductDisplay;
use Admin\Model\ProductDisplayTable;
use Admin\Model\ProductSound;
use Admin\Model\ProductSoundTable;
use Admin\Model\ProductMemory;
use Admin\Model\ProductMemoryTable;
use Admin\Model\ProductData;
use Admin\Model\ProductDataTable;
use Admin\Model\ProductCamera;
use Admin\Model\ProductCameraTable;
use Admin\Model\ProductFeatures;
use Admin\Model\ProductFeaturesTable;
use Admin\Model\ProductBattery;
use Admin\Model\ProductBatteryTable;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Session\SessionManager;
use Zend\Session\Container;


class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    private $loop;
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
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            //var_dump($moduleNamespace); exit;
            $config = $e->getApplication()->getServiceManager()->get('config');
            //echo '<pre>';var_dump($config['module_layouts'][$moduleNamespace]);die;
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


    public function getServiceConfig()
    {
        return array(
            'factories' => array(
//                'Admin\Model\VideoTable' =>  function($sm) {
//                        $tableGateway = $sm->get('VideoTableGateway');
//                        $table = new Model\VideoTable($tableGateway);
//                        return $table;
//                    },
//                'VideoTableGateway' => function ($sm) {
//                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
//                        $resultSetPrototype = new ResultSet();
//                        $resultSetPrototype->setArrayObjectPrototype(new Model\Video);
//                        return new TableGateway('video', $dbAdapter, null, $resultSetPrototype);
//                    },

                'Admin\Model\ProductTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductTableGateway');
                        $table = new Model\ProductTable($tableGateway);
                        return $table;
                },
                'ProductTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\Product());
                        return new TableGateway('products', $dbAdapter, null, $resultSetPrototype);
                },

                'Admin\Model\ProductBodyTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductBodyTableGateway');
                        $table = new Model\ProductBodyTable($tableGateway);
                        return $table;
                },
                'ProductBodyTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductBody());
                        return new TableGateway('product_body', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductSoundTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductSoundTableGateway');
                        $table = new Model\ProductSoundTable($tableGateway);
                        return $table;
                },
                'ProductSoundTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductSound());
                        return new TableGateway('product_sound', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductDisplayTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductDisplayTableGateway');
                        $table = new Model\ProductDisplayTable($tableGateway);
                        return $table;
                },
                'ProductDisplayTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductDisplay());
                        return new TableGateway('product_display', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductMemoryTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductMemoryTableGateway');
                        $table = new Model\ProductMemoryTable($tableGateway);
                        return $table;
                },
                'ProductMemoryTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductMemory());
                        return new TableGateway('product_memory', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductDataTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductDataTableGateway');
                        $table = new Model\ProductDataTable($tableGateway);
                        return $table;
                },
                'ProducDataTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductData());
                        return new TableGateway('product_data', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductCameraTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductCameraTableGateway');
                        $table = new Model\ProductCameraTable($tableGateway);
                        return $table;
                },
                'ProducCameraTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductCamera());
                        return new TableGateway('product_camera', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductFeaturesTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductFeaturesTableGateway');
                        $table = new Model\ProductFeaturesTable($tableGateway);
                        return $table;
                },
                'ProducFeaturesTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductFeatures());
                        return new TableGateway('product_features', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductBatteryTable' =>  function($sm) {
                        $tableGateway = $sm->get('ProductBatteryTableGateway');
                        $table = new Model\ProductBatteryTable($tableGateway);
                        return $table;
                },
                'ProducBatteryTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ProductBattery());
                        return new TableGateway('product_battery', $dbAdapter, null, $resultSetPrototype);
                },



            ),
        );
    }

    public function initAcl(MvcEvent $e) {

        $acl = new \Zend\Permissions\Acl\Acl();
        $roles = include __DIR__ . '/config/acl.config.php';
        $allResources = array();
        foreach ($roles as $role => $resources) {

            $role = new \Zend\Permissions\Acl\Role\GenericRole($role);
            $acl -> addRole($role);
            //print_r($resources);
            $allResources = array_merge($resources, $allResources);

            //adding resources
            //  foreach ($resources as $resource) {
            foreach ($allResources as $resource) {
                // Edit 4
                if(!$acl ->hasResource($resource))
                    $acl -> addResource(new \Zend\Permissions\Acl\Resource\GenericResource($resource));

            }
            //adding restrictions
            foreach ($allResources as $resource) {
                $acl -> allow($role, $resource);
            }
        }
        //testing
        //var_dump($acl->isAllowed('guest','video/edit')); exit;
        //true
        // var_dump($acl); exit;
        //setting to view
        //$acl->deny('guest','admin/video/edit');
        $e -> getViewModel() -> acl = $acl;

    }

    public function loadConfiguration(MvcEvent $e)
    {
        $user_session = new Container('user');
        $username = $user_session->name;
        $controller = $e->getTarget();
        $controller->layout()->name = $username;
    }

    public function checkAcl(MvcEvent $e) {

//         $controller = $e -> getRouteMatch() -> getMatchedRouteName();
//         $action = $e -> getRouteMatch()->getParam('action');
//         $mod = $e -> getRouteMatch()->getParam('controller');
//         var_dump($e); exit;
//         $mod = str_replace("\\", "/", $mod);
//        echo  $route = $mod."/".$action;

        $sm = $e->getApplication()->getServiceManager();

        $router = $sm->get('router');
        $request = $sm->get('request');
        $matchedRoute = $router->match($request);

        $params = $matchedRoute->getParams();

        $controller = $params['controller'];
        $action = $params['action'];

        $module_array = explode('\\', $controller);
        //var_dump($module_array);
        // $module = array_pop($module_array);

        //$route = strtolower($module_array[0])."/".strtolower($module_array[2])."/".$action;
        $route = strtolower($module_array[2])."/".$action;
        //var_dump($module."--".$controller."--".$action);


        //var_dump($e -> getRouteMatch()->getParam('action')); exit;
        //you set your role
        $userRole = 'admin';
        // echo !$e -> getViewModel() -> acl -> isAllowed($userRole, $route); exit;
        if ($e -> getViewModel() -> acl ->hasResource($route) && !$e -> getViewModel() -> acl -> isAllowed($userRole, $route)) {
            $response = $e -> getResponse();
            //location to page or what ever
            $response -> getHeaders() -> addHeaderLine('Location', $e -> getRequest() -> getBaseUrl() . '/404');
            $response -> setStatusCode(404);

        }
    }

    public function authPreDispatch(MvcEvent $e) {
        $user_session = new Container('user');
        $sm = $e->getApplication()->getServiceManager();

        $router = $sm->get('router');
        $request = $sm->get('request');
        $matchedRoute = $router->match($request);

        $params = $matchedRoute->getParams();

        $controller = $params['controller'];
        $action = $params['action'];
        $module_array = explode('\\', $controller);
        $module = $module_array[0]; //array_pop($module_array);
        //echo $module; exit;

        if ($action!='login' && $module=='Admin'){
            if(!isset($user_session->name)){
                $url = $e->getRouter()->assemble(array('action' => 'login'), array('name' => 'admin'));

                $response = $e->getResponse();
                $response->getHeaders()->addHeaderLine('Location', $url);
                $response->setStatusCode(302);
                $response->sendHeaders();
                exit;
            }
        }

    }


}
