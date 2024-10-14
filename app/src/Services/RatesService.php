<?php

namespace App\Services;

class RatesService
{

    public static function getRates() : array
    {
        $rates_file = ROOT_DIR . '/temp/rates2.xml';
        if(file_exists($rates_file)) {
            $content = file_get_contents($rates_file);
        } else {
            $url = 'https://www.bnb.bg/Statistics/StExternalSector/StExchangeRates/StERForeignCurrencies/index.htm?download=xml&search=&lang=BG';
            $content = file_get_contents($url);
            file_put_contents($rates_file, $content);
        }

        $json = self::xmlToJson($content);
        $aa = json_decode($json, true);
        unset($aa['ROW'][0]);
        return $aa['ROW'] ;
    }

    public static function getRate(string $currencyCode='' )
    {

         $rates = self::getRates();
        return self::filterByCurrencyCode($rates, $currencyCode);

    }
    static  function filterByCurrencyCode2($data, $currencyCode) {
        foreach ($data  as $row) {

            if (isset($row['CODE']) && $row['CODE'] === $currencyCode) {
                return $row; // Return the matching row
            }
        }
        return null; // Return null if no match found
    }
    static function filterByCurrencyCode(array $data, $currencyCode) : array{

        return array_filter($data, function($row) use ($currencyCode) {
            return isset($row['CODE']) && strtoupper($row['CODE']) === strtoupper($currencyCode);
        });
    }


    private static function xmlToJson($xml) //Convert XML to JSOn
    {
        $xml = simplexml_load_string($xml);
        return $json = json_encode($xml);
        //return $array = json_decode($json,TRUE);

    }
}