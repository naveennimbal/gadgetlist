<?php

 namespace Admin\Form;

 use Zend\Form\Form;
 use Admin\Model\Video;
 
class AddVideoForm extends Form {

    public function __construct($videoId = null) {
         parent::__construct('addVideo');
         $this->setAttribute('method', 'post');
         $this->setAttribute('enctype','multipart/form-data');
         
         $video = new Video();
         $this->setInputFilter($video->getInputFilter()); 
         
         $this->add(array(
            'name' => 'videoId',
            'type' => 'hidden',
            'attributes' => array(
                'value' => $videoId,
            ),
        ));
//        $this->add(array(
//             'name' => 'url',
//             'type' => 'Text',
//            'attributes' => array(
//                'id' => 'url',
//                'placeholder' => 'eg. http:://www.youtube.com/dh232kljd',
//                'class' => 'span8'
//             ),
//         ));
        
        
        $this->add(array(
            'name' => 'fileupload',
            'attributes' => array(
                'type'  => 'file',
                'class' =>'ace-file-input'
            ),
            'options' => array(
                //'label' => 'File Upload',
            ),
        )); 
        
         $this->add(array(
            'name' => 'userAccountId',
            'type' => 'Zend\Form\Element\Select',
              //  'required' => true,
                'attributes' => array(
                'id' => 'userAccountId',
            ),
              'options' => array(
                'empty_option' => 'Select one',
                'value_options' => array("1" => "Admin"),
            ),
        ));
//         $this->add(array(
//              'name'  => 'status',
//                'type'=>'Zend\Form\Element\Select',
//                'required' => true,
//                'attributes' => array(
//                'id' => 'status',
//                )  , 
//              'options' => array(
//                'empty_option' => 'Select one',
//                'value_options' => array("1"=>"Active","0"=>"Deactivate"),
//            ),
//            
//         ));
            
         $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'status',
                'attributes' => array(
                'id' => 'status',
                'class' => 'ace-switch ace-switch-5',
                
            ),
         ));
         
         $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
                'attributes' => array(
                'id' => 'submit',
                'class' => 'btn btn-info',
                 'value' => "Add Video"   
            ),
         ));
     }

 }
