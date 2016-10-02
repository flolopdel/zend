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

     public function __construct()
     {
        $this->user = "sollicit";
        $this->password = "ac0pX97n";
     }

     public function getFlightRoutes($params = null){
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

     public function getFlightSchedules($params = null){
        $client = new Client();

        $client->setAuth($this->user, $this->password, Client::AUTH_BASIC);
        $client->setUri('http://dezemerel.ddns.net/api/json/1F/flightschedules/');
        $client->setMethod(Request::METHOD_GET);
        $client->setParameterGet($params);

        $response = $client->send();

        $flightschedules = false;

        if($response->isSuccess()){
          $flightschedules = json_decode($response->getContent());
        }else{
          throw new \Exception("Api call error"); 
        }

        return $flightschedules;

     }

     public function getFlightAvailability($params = null){
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
 }