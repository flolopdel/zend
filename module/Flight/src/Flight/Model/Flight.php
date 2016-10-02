<?php

namespace Flight\Model;
// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface; 
use Zend\InputFilter\InputFilterInterface;

class Flight implements InputFilterAwareInterface {

	public $from;

	public $to;

	public $dateDeparture;

	public $dateDestination;

	public $adult;

	public $children;

	public $babies;

	protected $inputFilter;

	public function exchangeArray($data) {

		$this->id 				= (isset($data['id']));
		$this->from 			= (isset($data['from'])) ? $data['from'] : null;
		$this->to 				= (isset($data['to'])) ? $data['to'] : null;
		$this->dateDeparture 	= (isset($data['dateDeparture'])) ? $data['dateDeparture'] : null;
		$this->dateDestination 	= (isset($data['dateDestination'])) ? $data['dateDestination'] : null;
		$this->adult 			= (isset($data['adult'])) ? $data['adult'] : null;
		$this->children 		= (isset($data['children'])) ? $data['children'] : null;
		$this->babies 			= (isset($data['babies'])) ? $data['babies'] : null;
	}
	    // Add content to these methods:
	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception("Not used"); 
	}

	public function getInputFilter() {
		if (!$this->inputFilter) { 
			$inputFilter = new InputFilter();

			$inputFilter->add(array( 
				'name' => 'id', 
				'required' => true, 
				'filters' => array(
					array('name' => 'Int'), 
				),
			));

			$inputFilter->add(array( 
				'name' => 'artist', 
				'required' => true, 
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'), 
				),
				'validators' => array( 
					array(
						'name' => 'StringLength', 
						'options' => array(
                			'encoding' => 'UTF-8',
                			'min'      => 1,
                			'max'      => 100,
						), 
					),
				)
			));

			$inputFilter->add(array( 
				'name' => 'title', 
				'required' => true, 
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'), 
				),
				'validators' => array( 
					array(
						'name' => 'StringLength', 
						'options' => array(
                       		'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
						),
					),
				)
			));

            $this->inputFilter = $inputFilter;
        }
		return $this->inputFilter; 
	}
}