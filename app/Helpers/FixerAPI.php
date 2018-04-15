<?php
namespace App\Helpers;

use Carbon\Carbon;
use GuzzleHttp\Client as Guzzle;

class FixerAPI
{
    private $accessKey = '';
    
    function __construct() {
        $this->accessKey = config('fixer.accessKey');
    }

    public function getPriceByDate(Carbon $date, $currency = false) {
        $url = 'http://data.fixer.io/api/' . $date->format('Y-m-d') . '?access_key=' . $this->accessKey;
        if(!empty($currency)) {
            $url = 'http://data.fixer.io/api/' . $date->format('Y-m-d') . '?access_key=' . $this->accessKey . '&symbols=' . $currency;
        } 

        try {
            $client = new Guzzle();
            $res = $client->request('GET', $url);
            $responseArr = json_decode($res->getBody()->getContents(), true);
        } catch(\Exception $e) {
            return ['status' => 0, 'message' => 'api failed'];
        }

        if(empty($currency)) return $responseArr['rates']; //get all currencies
        return $responseArr['rates'][$currency];
    }
}