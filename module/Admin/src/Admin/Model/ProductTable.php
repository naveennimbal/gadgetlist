<?php
/**
 * Created by PhpStorm.
 * User: Naveen
 * Date: 10/25/14
 * Time: 6:06 PM
 */

namespace Admin\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class ProductTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false) {
        $sql = new Sql($this->tableGateway->adapter);
        $select = $sql->select();
        $select->from($this->tableGateway->getTable());
        $select->order('product_id DESC');
        //$select->join('role', 'user.role_id = role.id', array('role' => 'name'));
        //$select->join('group', 'user.group_id = group.id', array('group' => 'name'));

        if ($paginated) {
            $dbTableGatewayAdapter = new DbSelect($select, $sql);
            //$dbTableGatewayAdapter = new DbTableGateway($this->tableGateway);
            $paginator = new Paginator($dbTableGatewayAdapter);
            return $paginator;
        }

        $resultSet = $this->tableGateway->selectWith($select);

        return $resultSet;
    }

    public function save($product){
//         $data = array(
//             'url' => $video->url,
//             'userAccountId'  => $video->userAccountId,
//         );

        //$videoId = (!empty($this->getRequest()->getPost('videoId')))?$this->getRequest()->getPost('videoId'):"";
        $data = array(
            'videoId' => $product->videoId,
            'videoUrl' => $product->videoUrl,
            'videoPath' => $product->videoPath,
            'userAccountId' => $product->userAccountId,
            'status' => $product->status,
            'createdDate' => date("Y-m-d H:i:s"),
        );

        $id = (int) $product->product_id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
            return $this->tableGateway->getLastInsertValue();

        } else {
            if ($this->getProduct($id)) {
                $this->tableGateway->update($data, array('product_id' => $id));
            } else {
                throw new \Exception('product_id id does not exist');
            }
        }
    }


    public function getProduct($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('product_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function delete($id) {
        if($id <= 0){
            throw new Exception("Video Id doesnt exist");
        }
        return $this->tableGateway->delete(array('product_id'=>$id));
    }


}