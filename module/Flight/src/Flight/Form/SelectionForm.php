<?php

namespace Flight\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class SelectionForm extends Form {

	protected $inputFilter;

	public function __construct($name = null) {
        // we want to ignore the name passed
		parent::__construct('flight');

		$this->add(array( 
			'name' => 'flights',
            'type' => 'Hidden',
        ));
		$this->add(array(
			'name' => 'outselection', 
			'type' => 'Radio',
			'options' => array(
				'value_options' => array(
					0 => '',
				),
			),
		)); 
		$this->add(array(
			'name' => 'returnselection', 
			'type' => 'Radio',
			'options' => array(
				'value_options' => array(
					0 => '',
				),
			),
		));
		$this->add(array(
			'name' => 'submit',
			'type' => 'Submit',
			'attributes' => array(
			    'value' => 'Go',
			    'id' => 'submitbutton',
			),
		)); 
	}

	public function getInputFilter() {
		if (!$this->inputFilter) {
		 
			$inputFilter = new InputFilter();

			$inputFilter->add(array( 
				'name' => 'outselection', 
				'required' => true, 
			));

			$inputFilter->add(array( 
				'name' => 'returnselection', 
				'required' => true, 
			));

            $this->inputFilter = $inputFilter;
        }
		return $this->inputFilter; 
	}
}