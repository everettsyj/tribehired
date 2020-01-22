<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Data extends Model
{
    public static function dataCurl($url){
        $client = new Client();
        $response = $client->request('GET', $url);
        $body = $response->getBody()->getContents();

        return $body;
    }

}
