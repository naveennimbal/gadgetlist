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

class ProductCamera implements InputFilterAwareInterface
{
    protected $inputFilter;


    public $product_id;
    public $primary_cam;
    public $features;
    public $video;
    public $others;



    public function exchangeArray($data)
    {
        $this->product_id     = (isset($data['product_id'])) ? $data['product_id'] : null;
        $this->primary_cam   = (isset($data['primary_cam'])) ? $data['primary_cam']  : null;
        $this->features   = (isset($data['features'])) ? $data['features']  : null;
        $this->video   = (isset($data['video'])) ? $data['video']  : null;
        $this->secondary   = (isset($data['secondary'])) ? $data['secondary']  : null;

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
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'primary_cam',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'features',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'video',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'secondary',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));



            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}