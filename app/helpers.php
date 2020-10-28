<?php

use Illuminate\Support\Facades\Http;

 function totalElts($modules, $elements, $append, $orderby)
 {
     $objects =  Http::withBasicAuth('jules.bilitik@auf.org', 'Kiliane486')
                        ->withHeaders([
                            'content-type' =>'application/json'])
                        ->timeout(1200)
                        ->get('https://ejxa.fa.ca2.oraclecloud.com:443/'.$modules.'/resources/11.13.18.05/'.$elements.'?'.$append.'onlyData=true&expand=all&limit=5&totalResults=true&orderBy='.$orderby.':desc')
                        ->json();

     

     return $objects;
 }

  function listElts($liens)
  {
      $objects =  Http::withBasicAuth('jules.bilitik@auf.org', 'Kiliane486')
        ->withHeaders([
            'content-type' =>'application/json'])
        ->timeout(1200)
        ->get($liens)
        ->json();

      return $objects;
  }
