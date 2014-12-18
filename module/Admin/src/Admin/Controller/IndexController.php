<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\Product;
use Zend\Session\SessionManager;
use Zend\Session\Container;


class IndexController extends AbstractActionController
{
    protected $productTable;

    public function getProductTable()
    {
        if (!$this->productTable) {
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Admin\Model\ProductTable');
        }
        return $this->productTable;
    }

    public function indexAction()
    {
        //$product = new Product();
        //$list = $this->getProductTable()->fetchAll(true);
        //return new ViewModel(array("paginated" => $list));
        //echo "this is admin";

        $page = $this->params()->fromQuery('page') ? (int) $this->params()->fromQuery('page') : 1;
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
            'result' =>$result
        ));
    }


}
