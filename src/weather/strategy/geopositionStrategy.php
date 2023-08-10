<?php

namespace weatherApp\weather\strategy;

use weatherApp\weather\interface\StrategyInterface;

class geopositionStrategy implements StrategyInterface{
    private $strategyUrl;


    function __construct(){
        $this->strategyUrl = "/search.json?q=";
    }
    function getLocationKey($data){
        return 1;
    }

    function getUrl(){
        return $this->strategyUrl;
    }
}