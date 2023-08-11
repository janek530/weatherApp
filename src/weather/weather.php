<?php

namespace weatherApp;

use weatherApp\weather\interface\StrategyInterface;
use weatherApp\weather\strategy\PostalCodeStrategy;
use weatherApp\weather\strategy\GeopositionStrategy;

class Weather {
    private $url = "http://dataservice.accuweather.com/locations";
    private $apiKey = "S3fCBUtVUXseMvWJbmJ0OsKt4CYDivVl";
    private $locationKey;
    private $strategy;
    private $location;


    function getLocationKey(){
        $json = $this->call();
    }

    function setStrategy($strategy) {
        if ($strategy == "geoposition"){
            $this->strategy = new GeopositionStrategy();
        }
        elseif ($strategy == "postalCode"){
            $this->strategy = new PostalCodeStrategy();
        }
        // elseif ($strategy == "cityName"){
            // $this->strategy = new CityNameStrategy();
        // }
        else{
            return "nieobsługiwany typ.";
        }
    }

    function getStrategyUrl(){
        return $this->strategy->getUrl();
    }

    function setLocation($location){
        $this->location = $location;
    }

    function call(){
        $url = $this->url.$this->getStrategyUrl().$this->location."&apikey=".$this->apiKey;
        $curl = curl_init($url);
        $response = curl_exec($curl);
        print_r($response);
        if (curl_errno($curl)){
            echo 'CURL ERROR: '.curl_error($curl);
        }

        curl_close($curl);

        $json = json_decode($response);

        return $json;
    }
}
