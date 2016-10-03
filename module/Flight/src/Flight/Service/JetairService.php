<?php

 namespace Flight\Service;

use Zend\Http\Client;
use Zend\Http\Request;

 class JetairService
 {
     /**
      * {@inheritDoc}
      */

     protected $user;
     protected $password;

     /*
     * MANDATORYPARAMS 
     * 
     * {('locale' => 'nl_BE'),('departureairport' => 'OST'),('destinationairport' => 'ALC'), ('departuredate' => '20160401'), ('adults' => '1'), ('children' => '1'), ('infants' => '1')}
     *
     */
     protected $mandatoryParams;

     public function __construct()
     {
        $this->user = "sollicit";
        $this->password = "ac0pX97n";
        $this->mandatoryParams = array(
            'locale' => 'nl_BE',
            'departureairport' => 'ORY',
            'destinationairport' => 'AGP',
            'departuredate' => '20160930',
            'adults' => '1',
            'children' => '1',
            'infants' => '1',
        );
     }

     /*
     * MANDATORYPARAMS 
     * 
     * {('locale' => 'nl_BE')}
     *
     *
     * OPTIONALSPARAMS 
     * 
     * {('departureairport' => 'OST'),('destinationairport' => 'ALC')}
     *
     */
     public function getFlightRoutes($params = null){

        $params = $this->getParams($params, array('locale'));

        $client = new Client();

        $client->setAuth($this->user, $this->password, Client::AUTH_BASIC);
        $client->setUri('http://dezemerel.ddns.net/api/json/1F/flightroutes/');
        $client->setMethod(Request::METHOD_GET);
        $client->setParameterGet($params);

        $response = $client->send();

        $routes = false;

        if($response->isSuccess()){
          $routes = json_decode($response->getContent());
        }else{
          throw new \Exception("Api call error"); 
        }

        return $routes;

     }

     /*
     * MANDATORYPARAMS 
     * 
     * {('locale' => 'nl_BE'),('departureairport' => 'OST'),('destinationairport' => 'ALC')}
     *
     *
     * OPTIONALSPARAMS 
     * 
     * {('returndepartureairport' => 'OST'),('returndestiantionairport' => 'ALC')}
     *
     */
     public function getFlightSchedules($params = array()){

        $params = $this->getParams($params, array('locale', 'departureairport', 'destinationairport'));

        $client = new Client();

        $client->setAuth($this->user, $this->password, Client::AUTH_BASIC);
        $client->setUri('http://dezemerel.ddns.net/api/json/1F/flightschedules/');
        $client->setMethod(Request::METHOD_GET);
        if($params){
            $client->setParameterGet($params);
        }

        $response = $client->send();

        $flightschedules = false;

        if($response->isSuccess()){
          $flightschedules = json_decode($response->getContent());
        }else{
          throw new \Exception("Api call error"); 
        }

        return $flightschedules;

     }

     /*
     * MANDATORYPARAMS 
     * 
     * {('locale' => 'nl_BE'),('departureairport' => 'OST'),('destinationairport' => 'ALC'), ('departuredate' => '20160401'), ('adults' => '1'), ('children' => '1'), ('infants' => '1')}
     *
     *
     * OPTIONALSPARAMS 
     * 
     * {('returndepartureairport' => 'OST'),('returndestiantionairport' => 'ALC'), ('returndate' => '20160401')}
     *
     */
     public function getFlightAvailability($params = null){

        $params = $this->getParams($params, array('locale', 'departureairport', 'destinationairport', 'departuredate', 'adults', 'children', 'infants'));

        $client = new Client();

        $client->setAuth($this->user, $this->password, Client::AUTH_BASIC);
        $client->setUri('http://dezemerel.ddns.net/api/json/1F/flightavailability/');
        $client->setMethod(Request::METHOD_GET);
        $client->setParameterGet($params);

        $response = $client->send();

        $flightavailability = false;

        if($response->isSuccess()){
          $flightavailability = json_decode($response->getContent());
        }else{
          throw new \Exception("Api call error"); 
        }

        return $flightavailability;

     }

     private function getParams($params, $mandatorykeys = null){

            if($mandatorykeys){
                foreach ($mandatorykeys as $mandatorykey) {
                    if(!isset($params[$mandatorykey])){
                        $params[$mandatorykey] = $this->mandatoryParams[$mandatorykey];
                    }
                }
            }

            return $params;
     }
 }