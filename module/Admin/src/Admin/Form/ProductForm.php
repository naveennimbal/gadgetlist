<?php

namespace Admin\Form;

use Admin\Model\Product;
use Zend\Form\Form;
use Admin\Model\Video;

class ProductForm extends Form {

    public function __construct($product_id = null) {
        parent::__construct('addProduct');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $product = new Product();
        $this->setInputFilter($product->getInputFilter());

        $this->add(array(
            'name' => 'videoId',
            'type' => 'hidden',
            'attributes' => array(
                'value' => $product_id,
            ),
        ));

        $this->add(array(
            'name' => 'product_name',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));

        $this->add(array(
            'name' => 'category_id',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'product_type_id',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));



        $this->add(array(
            'name' => 'brand_id',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'product_alias',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'release_date',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'announce_date',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'sim',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'status',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'date_added',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));
        $this->add(array(
            'name' => 'dimension',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'weight',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'type',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'size',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'multitouch',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'protection',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

        $this->add(array(
            'name' => 'display_others',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'alert_type',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'loudspeaker',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));


        $this->add(array(
            'name' => 'jack_35mm',
            'attributes' => array(
                'type'  => 'text',
            ),
            
        ));

        $this->add(array(
            'name' => 'sound_others',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'card_slot',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'ram',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'internal',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'gprs',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'edge',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'speed',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'wlan',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'bluetooth',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'nfc',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'usb',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'primary_cam',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'features',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

          $this->add(array(
            'name' => 'video',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'secondary',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'os',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'chipset',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'cpu',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'gpu',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'sensors',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'messaging',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'browser',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'radio',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'gps',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'java',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'colors',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'features_others',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'battery',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'standby',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));


        $this->add(array(
            'name' => 'talktime',
            'attributes' => array(
                'type'  => 'text',
            ),

        ));

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
