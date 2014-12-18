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

class ProductFeatures implements InputFilterAwareInterface
{
    protected $inputFilter;

    public $product_id;
    public $os;
    public $chipset;
    public $cpu;
    public $gpu;
    public $sensors;
    public $messaging;
    public $browser;
    public $radio;
    public $gps;
    public $java;
    public $colors;
    public $features_others;


    public function exchangeArray($data)
    {
        $this->product_id = (isset($data['product_id'])) ? $data['product_id'] : null;
        $this->os = (isset($data['os'])) ? $data['os'] : null;
        $this->chipset = (isset($data['chipset'])) ? $data['chipset'] : null;
        $this->cpu = (isset($data['cpu'])) ? $data['cpu'] : null;
        $this->gpu = (isset($data['gpu'])) ? $data['gpu'] : null;
        $this->sensors = (isset($data['sensors'])) ? $data['sensors'] : null;
        $this->messaging = (isset($data['messaging'])) ? $data['messaging'] : null;
        $this->browser = (isset($data['browser'])) ? $data['browser'] : null;
        $this->radio = (isset($data['radio'])) ? $data['radio'] : null;
        $this->gps = (isset($data['gps'])) ? $data['gps'] : null;
        $this->java = (isset($data['java'])) ? $data['java'] : null;
        $this->colors = (isset($data['colors'])) ? $data['colors'] : null;
        $this->features_others = (isset($data['features_others'])) ? $data['features_others'] : null;

    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }


    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }


    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            $inputFilter->add(array(
                'name' => 'product_id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name' => 'os',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'chipset',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'cpu',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'gpu',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'sensors',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'messaging',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'browser',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'radio',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'gps',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'java',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'colors',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'features_others',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));


            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}