<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Flight\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Flight\Model\Flight;
use Flight\Form\FlightForm;
use Flight\Form\SelectionForm;

use Flight\Service\JetairService;

class FlightController extends AbstractActionController
{
    public function indexAction()
    {
    	$form = new FlightForm();
    	$form->get('submit')->setValue('Search and book >');

		$requestForm = $this->getRequest();

		if ($requestForm->isPost()) { 
			$flight = new Flight();
            $form->setInputFilter($flight->getInputFilter());
            $form->setData($requestForm->getPost());
			if ($form->isValid()) { 
				$flight->exchangeArray($form->getData());
				var_dump($flight->artist);
			}
		}

		return array('form' => $form);
    }

    public function detailsAction()
    {

        $jetairClient = new JetairService();
        $flightDetails = $jetairClient->getFlightAvailability(array('returndepartureairport' => 'AGP', 'returndestinationairport' => 'ORY'));

        $outsbound = $flightDetails->flights->OUT;
        $return = $flightDetails->flights->RET;

        $form = new SelectionForm();
        $form->get('submit')->setValue('View flight details');

        
        $requestForm = $this->getRequest();

        if ($requestForm->isPost()) { 
            $form->setInputFilter($form->getInputFilter());
            $form->setData($requestForm->getPost());

            if ($form->isValid()) {
                $formData           = $form->getData(); 
                $outsbound_index    = (int)$formData['outselection'];
                $return_index       = (int)$formData['returnselection'];

                return $this->showAction($outsbound[$outsbound_index],$return[$return_index]);
            }
        }



        return array('form' => $form, 'outsbound' => $outsbound, 'return' => $return, 'action' => 'details');

    }

    public function showAction($outsbound, $return)
    {
        var_dump($outsbound);die;

        return array('outsbound' => $outsbound, 'return' => $return, 'action' => 'show');   
    }

    public function deleteAction()
    {

    }
}
