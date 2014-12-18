<?php
namespace Admin\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class VideoTable
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
        $select->order('videoId DESC');
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
    
    public function saveVideo($video){
//         $data = array(
//             'url' => $video->url,
//             'userAccountId'  => $video->userAccountId,
//         );
    
          //$videoId = (!empty($this->getRequest()->getPost('videoId')))?$this->getRequest()->getPost('videoId'):""; 
            $data = array(
                'videoId' => $video->videoId,
                'videoUrl' => $video->videoUrl,
                'videoPath' => $video->videoPath,
                'userAccountId' => $video->userAccountId,
                'status' => $video->status,
                'createdDate' => date("Y-m-d H:i:s"),
            );

         $id = (int) $video->videoId;
         if ($id == 0) {
             $this->tableGateway->insert($data);
             return $this->tableGateway->getLastInsertValue();
             
         } else {
             if ($this->getVideo($id)) {
                 $this->tableGateway->update($data, array('videoId' => $id));
             } else {
                 throw new \Exception('Video id does not exist');
}
         }
    }
    
    
    public function getVideo($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('videoId' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
     
     public function deleteVideo($id) {
         if($id <= 0){
             throw new Exception("Video Id doesnt exist");
         }
          return $this->tableGateway->delete(array('videoId'=>$id));
     }

    
}