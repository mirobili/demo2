<?php

namespace App\Controllers;
//
//use App\Views\RatesView;
use App\Services\RatesService;
class RatesController
{

    public function index()
    {
        return RatesService::getRates();
    }

    public function currency(  $currencyCode  ){

       // trace(func_get_args());

        return  RatesService::getRate($currencyCode);
    }
    public function currency_params(    $code='', $param2=''  ){

//        trace(func_get_args());
//        trace($code);
//        trace($params2);

//        $currencyCode = $params['currencyCode'];
        return  RatesService::getRate($code);
    }
}