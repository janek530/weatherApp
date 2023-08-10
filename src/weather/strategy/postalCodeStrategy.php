<?php

namespace weatherApp\weather\strategy;

use weatherApp\weather\interface\StrategyInterface;

class PostalCodeStrategy implements StrategyInterface{
    private $strategyUrl = "/v1/search?q=";

    function getLocationKey($data){
        return 1;
    }

    function getUrl(){
        return $this->strategyUrl;
    }

}