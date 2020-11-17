<?php

use Illuminate\Support\Facades\Http;

 function totalElts($modules, $elements, $append, $orderby)
 {
     $objects =  Http::withHeaders([
                            'Authorization' => 'Basic ',
                            'content-type' =>'application/json'])
                        ->timeout(1200)
                        ->get('https://ejxa.fa.ca2.oraclecloud.com:443/'.$modules.'/resources/11.13.18.05/'.$elements.'?'.$append.'onlyData=true&expand=all&limit=5&totalResults=true&orderBy='.$orderby.':desc')
                        ->json();

     

     return $objects;
 }

  function listElts($liens)
  {
      $objects =  Http::withHeaders([
            'Authorization' => 'Basic',
            'content-type' =>'application/json'])
        ->timeout(1200)
        ->get($liens)
        ->json();

      return $objects;
  }


  function listElts2($liens)
  {
      $objects =  Http::withHeaders([',
            'content-type' =>'application/json'])
        ->timeout(1200)
        ->get($liens)
        ->json();

      return $objects;
  }
