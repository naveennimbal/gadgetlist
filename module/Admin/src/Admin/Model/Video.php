<?php
namespace Admin\Model;

 // Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Video implements InputFilterAwareInterface
{
     protected $inputFilter;
     public $videoId;
     //public $url;
     public $videoPath;
     public $videoUrl;
     public $userAccountId;
     public $status;
     public $createdDate;


     public function exchangeArray($data)
     {
         $this->videoId     = (isset($data['videoId'])) ? $data['videoId'] : null;
         $this->videoUrl   = (isset($data['videoUrl'])) ? $data['videoUrl']  : null;
         $this->videoPath   = (isset($data['videoPath'])) ? $data['videoPath']  : null;
         $this->userAccountId   = (isset($data['userAccountId'])) ? $data['userAccountId']  : null;
         $this->status   = (isset($data['status'])) ? $data['status']  : null;
         $this->createdDate   = (isset($data['createdDate'])) ? $data['createdDate']  : null;
     }
     
     public function getArrayCopy(){
            return get_object_vars($this);
     }
     
     
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }
     
     
      public function getInputFilter(){
           if (!$this->inputFilter) {
             $inputFilter = new InputFilter();
             $factory     = new InputFactory();
             /* $inputFilter->add(array(
                 'name'     => 'videoId',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));*/
             $inputFilter->add(
                $factory->createInput(array(
                    'name'     => 'fileupload',
                    'required' => true,
                ))
            );
             
//             $inputFilter->add(array(
//                 'name'     => 'url',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'StripTags'),
//                     array('name' => 'StringTrim'),
//                 ),
//                 'validators' => array(
//                     array(
//                         'name'    => 'StringLength',
//                         'options' => array(
//                             'encoding' => 'UTF-8',
//                             'min'      => 10,
//                             'max'      => 150,
//                         ),
//                     ),
//                 ),
//             ));
             
             $inputFilter->add(array(
                 'name'     => 'userAccountId',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                         ),
                     ),
                 ),
             ));

              $this->inputFilter = $inputFilter;   
      }
            return $this->inputFilter;
}
}