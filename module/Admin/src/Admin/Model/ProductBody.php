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

class ProductBody implements InputFilterAwareInterface
{
    protected $inputFilter;


    public $product_id;
    public $dimension;
    public $weight;

    public function exchangeArray($data)
    {
        $this->product_id     = (isset($data['product_id'])) ? $data['product_id'] : null;
        $this->dimension   = (isset($data['dimension'])) ? $data['dimension']  : null;
        $this->weight   = (isset($data['weight'])) ? $data['weight']  : null;
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
                'name'     => 'dimension',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'weight',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'Int'),
                ),
            ));



            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}