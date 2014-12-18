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

class ProductData implements InputFilterAwareInterface
{
    protected $inputFilter;


    public $product_id;
    public $gprs;
    public $edge;
    public $speed;
    public $wlan;
    public $bluetooth;
    public $nfc;
    public $usb;



    public function exchangeArray($data)
    {
        $this->product_id     = (isset($data['product_id'])) ? $data['product_id'] : null;
        $this->gprs   = (isset($data['gprs'])) ? $data['gprs']  : null;
        $this->edge   = (isset($data['edge'])) ? $data['edge']  : null;
        $this->speed   = (isset($data['speed'])) ? $data['speed']  : null;
        $this->wlan   = (isset($data['wlan'])) ? $data['wlan']  : null;
        $this->bluetooth   = (isset($data['bluetooth'])) ? $data['bluetooth']  : null;
        $this->nfc   = (isset($data['nfc'])) ? $data['nfc']  : null;
        $this->usb   = (isset($data['usb'])) ? $data['usb']  : null;

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
                'name'     => 'gprs',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'edge',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'speed',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'wlan',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'bluetooth',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'nfc',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'usb',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}