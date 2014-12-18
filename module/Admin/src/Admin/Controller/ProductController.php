<?php
/**
 * Created by PhpStorm.
 * User: Naveen
 * Date: 11/7/14
 * Time: 6:39 AM
 */


namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\Product;
use Admin\Model\ProductBattery;
use Admin\Model\ProductBody;
use Admin\Model\ProductCamera;
use Admin\Model\ProductData;
use Admin\Model\ProductDisplay;
use Admin\Model\ProductFeatures;
use Admin\Model\ProductMemory;
use Admin\Model\ProductSound;
//use Admin\Model\Video;
use Zend\Session\SessionManager;
use Zend\Session\Container;
use Admin\Form\ProductForm;


class ProductController extends AbstractActionController
{


    protected $productTable;
    protected $productBatteryTable;
    protected $productBodyTable;
    protected $productCameraTable;
    protected $productDataTable;
    protected $productDisplayTable;
    protected $productFeaturesTable;
    protected $productMemoryTable;
    protected $productSoundTable;
    protected $VideoTable;

    public function getProductTable()
    {
        if (!$this->productTable) {
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Admin\Model\ProductTable');
        }
        return $this->productTable;
    }

    public function getProductBatteryTable()
    {
        if (!$this->productBatteryTable) {
            $sm = $this->getServiceLocator();
            $this->productBatteryTable = $sm->get('Admin\Model\productBatteryTable');
        }
        return $this->productBatteryTable;
    }

    public function getProductBodyTable()
    {
        if (!$this->productBodyTable) {
            $sm = $this->getServiceLocator();
            $this->productBodyTable = $sm->get('Admin\Model\ProductBodyTable');
        }
        return $this->productBodyTable;
    }

    public function getProductCameraTable()
    {
        if (!$this->productCameraTable) {
            $sm = $this->getServiceLocator();
            $this->productCameraTable = $sm->get('Admin\Model\ProductCameraTable');
        }
        return $this->productCameraTable;
    }

    public function getProductDataTable()
    {
        if (!$this->productDataTable) {
            $sm = $this->getServiceLocator();
            $this->productDataTable = $sm->get('Admin\Model\ProductDataTable');
        }
        return $this->productDataTable;
    }

    public function getProductDisplayTable()
    {
        if (!$this->productDisplayTable) {
            $sm = $this->getServiceLocator();
            $this->productDisplayTable = $sm->get('Admin\Model\ProductDisplayTable');
        }
        return $this->productDisplayTable;
    }

    public function getProductFeaturesTable()
    {
        if (!$this->productFeaturesTable) {
            $sm = $this->getServiceLocator();
            $this->productFeaturesTable = $sm->get('Admin\Model\ProductFeaturesTable');
        }
        return $this->productFeaturesTable;
    }

    public function getProductMemoryTable()
    {
        if (!$this->productMemoryTable) {
            $sm = $this->getServiceLocator();
            $this->productMemoryTable = $sm->get('Admin\Model\ProductMemoryTable');
        }
        return $this->productMemoryTable;
    }

    public function getProductSoundTable()
    {
        if (!$this->productSoundTable) {
            $sm = $this->getServiceLocator();
            $this->productSoundTable = $sm->get('Admin\Model\ProductSoundTable');
        }
        return $this->productSoundTable;
    }

    public function getVideoTable()
    {
        if (!$this->VideoTable) {
            $sm = $this->getServiceLocator();
            $this->VideoTable = $sm->get('Admin\Model\VideoTable');
        }
        return $this->VideoTable;
    }

    public function indexAction()
    {
        //$product = new Product();
        //$list = $this->getProductTable()->fetchAll(true);
        //return new ViewModel(array("paginated" => $list));
        //echo "this is admin";

        $page = $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page') : 1;
        $result = array();
        $paginator = $this->getProductTable()->fetchAll(true);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage(5);
        $paginator->setPageRange(10);

        foreach ($paginator->getItemsByPage($page) as $item) {
            //$item->regionId =  $this->getRegionTable()->getRegionName($item->regionId);
            //$item->chapterState = $this->getStateTable()->getStateNameById($item->chapterState);
            $result[] = $item;
        }


        return new ViewModel(array(
            'paginator' => $paginator,
            'result' => $result
        ));
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $productId = $this->params()->fromRoute('id');
        $form = new ProductForm($productId);
        if ($productId == "" || $productId <= 0) {
            $productId = $this->params()->fromPost('productId');
        }
        $allProductData = "";
        $product = "";
        $productBattery = "";
        $productBody = "";
        $productCamera = "";
        $productData = "";
        $productDisplay = "";
        $productFetaures = "";
        $productMemory = "";
        $productSound = "";
        try {
            $product = $this->getProductTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productBattery = $this->getProductBatteryTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productBody = $this->getProductBodyTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productCamera = $this->getProductCameraTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productData = $this->getProductDataTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productDisplay = $this->getProductDisplayTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productFetaures = $this->getProductFeaturesTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        try {

            $productMemory = $this->getProductMemoryTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }

        try {

            $productSound = $this->getProductSoundTable()->getProduct($productId);
        } catch (\Exception $e) {
            $e->getMessage();
        }


        $form->bind($product);
        $form->bind($productBattery);
        $form->bind($productBody);
        $form->bind($productCamera);
        $form->bind($productData);
        $form->bind($productDisplay);
        $form->bind($productFetaures);
        $form->bind($productMemory);
        $form->bind($productSound);
        $request = $this->getRequest();

        if ($request->isPost()) {

            $form->setInputFilter($product->getInputFilter());
            $form->setInputFilter($productBattery->getInputFilter());
            $form->setInputFilter($productBody->getInputFilter());
            $form->setInputFilter($productCamera->getInputFilter());
            $form->setInputFilter($productData->getInputFilter());
            $form->setInputFilter($productDisplay->getInputFilter());
            $form->setInputFilter($productFetaures->getInputFilter());
            $form->setInputFilter($productMemory->getInputFilter());
            $form->setInputFilter($productSound->getInputFilter());

            $form->setData($request->getPost());
            //print_r($request->getPost()); exit;
            if ($form->isValid()) {
                //echo "<pre>";print_r($request->getPost()); exit;
                $this->getProductTable()->save($request->getPost());
                $this->getProductBatteryTable()->save($request->getPost());
                $this->getProductBodyTable()->save($request->getPost());
                $this->getProductCameraTable()->save($request->getPost());
                $this->getProductDataTable()->save($request->getPost());
                $this->getProductDisplayTable()->save($request->getPost());
                $this->getProductFeaturesTable()->save($request->getPost());
                $this->getProductMemoryTable()->save($request->getPost());
                $this->getProductSoundTable()->save($request->getPost());
                return $this->redirect()->toRoute('product');
            }
        }

        return array('productId' => $productId, 'form' => $form);


    }
}