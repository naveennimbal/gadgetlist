<?php
/**
 * Created by PhpStorm.
 * User: Naveen
 * Date: 10/25/14
 * Time: 6:06 PM
 */

namespace Admin\Model;

// Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Product implements InputFilterAwareInterface
{
    protected $inputFilter;


    public $product_id;
    public $product_name;
    public $category_id;
    public $product_type_id;
    public $brand_id;
    public $product_alias;
    public $release_date;
    public $announce_date;
    public $sim;
    public $status;
    public $date_added;


    public function exchangeArray($data)
    {
        $this->product_id     = (isset($data['product_id'])) ? $data['product_id'] : null;
        $this->product_name   = (isset($data['product_name'])) ? $data['product_name']  : null;
        $this->category_id   = (isset($data['category_id'])) ? $data['category_id']  : null;
        $this->product_type_id   = (isset($data['product_type_id'])) ? $data['product_type_id']  : null;
        $this->brand_id   = (isset($data['brand_id'])) ? $data['brand_id']  : null;
        $this->product_alias   = (isset($data['product_alias'])) ? $data['product_alias']  : null;
        $this->release_date   = (isset($data['release_date'])) ? $data['release_date']  : null;
        $this->announce_date   = (isset($data['announce_date'])) ? $data['announce_date']  : null;
        $this->sim   = (isset($data['sim'])) ? $data['sim']  : null;
        $this->status   = (isset($data['status'])) ? $data['status']  : null;
        $this->date_added   = (isset($data['date_added'])) ? $data['date_added']  : null;
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
             $inputFilter->add(array(
                'name'     => 'product_id',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'category_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'product_type_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'brand_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'product_alias',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'release_date',
                'required' => true,

            ));

            $inputFilter->add(array(
                'name'     => 'announce_date',
                'required' => true,

            ));

            $inputFilter->add(array(
                'name'     => 'sim',
                'required' => true,

            ));









             $inputFilter->add(array(
                 'name'     => 'product_name',
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
                             'min'      => 10,
                             'max'      => 150,
                         ),
                     ),
                 ),
             ));

//            $inputFilter->add(array(
//                'name'     => 'userAccountId',
//                'required' => true,
//                'filters'  => array(
//                    array('name' => 'StripTags'),
//                    array('name' => 'StringTrim'),
//                ),
//                'validators' => array(
//                    array(
//                        'name'    => 'StringLength',
//                        'options' => array(
//                            'encoding' => 'UTF-8',
//                            'min'      => 1,
//                        ),
//                    ),
//                ),
//            ));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}