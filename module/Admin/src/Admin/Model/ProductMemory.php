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

class ProductMemory implements InputFilterAwareInterface
{
    protected $inputFilter;


    public $product_id;
    public $card_slot;
    public $ram;
    public $internal;
    public $others;



    public function exchangeArray($data)
    {
        $this->product_id     = (isset($data['product_id'])) ? $data['product_id'] : null;
        $this->card_slot   = (isset($data['card_slot'])) ? $data['card_slot']  : null;
        $this->ram   = (isset($data['ram'])) ? $data['ram']  : null;
        $this->internal   = (isset($data['internal'])) ? $data['internal']  : null;


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
                'name'     => 'card_slot',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'ram',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'internal',
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