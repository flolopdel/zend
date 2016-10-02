<?php

namespace Flight\Form;
use Zend\Form\Form;

class FlightForm extends Form {

	public function __construct($name = null) {
        // we want to ignore the name passed
		parent::__construct('flight');

		$this->add(array( 
			'name' => 'id',
            'type' => 'Hidden',
        ));
		$this->add(array(
			'name' => 'from', 
			'type' => 'Text', 
			'options' => array(
				'label' => 'From',
			),
		)); 
		$this->add(array(
			'name' => 'to',
			'type' => 'Text',
			'options' => array(
                'label' => 'To',
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
}