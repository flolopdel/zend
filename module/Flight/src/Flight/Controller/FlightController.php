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
        $response = '{"flights":{"OUT":[{"date":"2016-09-30","aircrafttype":"B77W","datetime":"2016-09-30T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-09-30","aircrafttype":"B77W","datetime":"2016-09-30T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-02","aircrafttype":"B77W","datetime":"2016-10-02T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-02","aircrafttype":"B77W","datetime":"2016-10-02T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-07","aircrafttype":"B77W","datetime":"2016-10-07T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-07","aircrafttype":"B77W","datetime":"2016-10-07T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-09","aircrafttype":"B77W","datetime":"2016-10-09T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-09","aircrafttype":"B77W","datetime":"2016-10-09T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-14","aircrafttype":"B77W","datetime":"2016-10-14T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-14","aircrafttype":"B77W","datetime":"2016-10-14T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-16","aircrafttype":"B77W","datetime":"2016-10-16T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-16","aircrafttype":"B77W","datetime":"2016-10-16T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-21","aircrafttype":"B77W","datetime":"2016-10-21T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-21","aircrafttype":"B77W","datetime":"2016-10-21T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-23","aircrafttype":"B77W","datetime":"2016-10-23T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-23","aircrafttype":"B77W","datetime":"2016-10-23T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-28","aircrafttype":"B77W","datetime":"2016-10-28T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-28","aircrafttype":"B77W","datetime":"2016-10-28T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-30","aircrafttype":"B77W","datetime":"2016-10-30T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-30","aircrafttype":"B77W","datetime":"2016-10-30T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-04","aircrafttype":"B77W","datetime":"2016-11-04T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-04","aircrafttype":"B77W","datetime":"2016-11-04T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-06","aircrafttype":"B77W","datetime":"2016-11-06T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-06","aircrafttype":"B77W","datetime":"2016-11-06T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}}],"RET":[{"date":"2016-09-30","aircrafttype":"B77W","datetime":"2016-09-30T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-09-30","aircrafttype":"B77W","datetime":"2016-09-30T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-02","aircrafttype":"B77W","datetime":"2016-10-02T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-02","aircrafttype":"B77W","datetime":"2016-10-02T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-07","aircrafttype":"B77W","datetime":"2016-10-07T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-07","aircrafttype":"B77W","datetime":"2016-10-07T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-09","aircrafttype":"B77W","datetime":"2016-10-09T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-09","aircrafttype":"B77W","datetime":"2016-10-09T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-14","aircrafttype":"B77W","datetime":"2016-10-14T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-14","aircrafttype":"B77W","datetime":"2016-10-14T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-16","aircrafttype":"B77W","datetime":"2016-10-16T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-16","aircrafttype":"B77W","datetime":"2016-10-16T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-21","aircrafttype":"B77W","datetime":"2016-10-21T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-21","aircrafttype":"B77W","datetime":"2016-10-21T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-23","aircrafttype":"B77W","datetime":"2016-10-23T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-23","aircrafttype":"B77W","datetime":"2016-10-23T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-28","aircrafttype":"B77W","datetime":"2016-10-28T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-28","aircrafttype":"B77W","datetime":"2016-10-28T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-30","aircrafttype":"B77W","datetime":"2016-10-30T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-10-30","aircrafttype":"B77W","datetime":"2016-10-30T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-04","aircrafttype":"B77W","datetime":"2016-11-04T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-04","aircrafttype":"B77W","datetime":"2016-11-04T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-06","aircrafttype":"B77W","datetime":"2016-11-06T16:45:00","price":"110","seatsAvailable":"23","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}},{"date":"2016-11-06","aircrafttype":"B77W","datetime":"2016-11-06T18:48:00","price":"215","seatsAvailable":"10","depart":{"airport":{"code":"ORY","name":"Orly Airport"}},"arrival":{"airport":{"code":"AGP","name":"M\u00e1laga Airport"}}}]}}';

        $flightDetails = json_decode($response);
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



        return array('form' => $form, 'outsbound' => $outsbound, 'return' => $return, 'flights' => $response);

    }

    public function showAction($outsbound, $return)
    {

        return array('outsbound' => $outsbound, 'return' => $return);   
    }

    public function deleteAction()
    {

    }
}
