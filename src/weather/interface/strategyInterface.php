<?php

namespace weatherApp\weather\interface;

interface StrategyInterface{
    function getUrl();
    function getLocationKey($data);
}