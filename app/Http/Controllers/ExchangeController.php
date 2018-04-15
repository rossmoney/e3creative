<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Helpers\FixerAPI;

use App\Models\BirthdayPrice;

class ExchangeController extends Controller
{
    public function getLastBirthdayPrice(Request $r) {
        $now = Carbon::now();

        if($r->month >= 1 && $r->month <= $now->month) {
            $year = $now->year;
        } else {
            $year = $now->year - 1;
        }

        $fixerApi = new FixerAPI();
        try {
            $date = Carbon::parse( $year . '-'. $r->month . '-' . $r->day);
        } catch(\Exception $e) {
            //invalid date
            return response()->json(['status' => 0, 'message' => 'Invalid date specified!'], 401);
        }

        if($date->greaterThan($now)) {
            return response()->json(['status' => 0, 'message' => 'Future date specified!'], 401);
        }

        if(isset($r->currency)) {
            $price = $fixerApi->getPriceByDate($date, $r->currency);
        } else {
            $price = $fixerApi->getPriceByDate($date, 'GBP');
        }

        if(isset($price['status']) && $price['status'] == 0) return response()->json(['status' => 0, 'message' => 'Could not retrieve price, service is unavailable!'], 401);

        $priceRecord = new BirthdayPrice();
        $priceRecord->birthday = $date->format('Y-m-d');
        $priceRecord->price = $price;
        $priceRecord->currency = 'GBP';
        $priceRecord->save();

        return response()->json([ 'price' => $price ], 200);
    }

    public function getSavedPrices(Request $r) {
        $prices = BirthdayPrice::select('birthday as date', \DB::raw('DATE_FORMAT(birthday, "%D %M %Y") as birthday'), \DB::raw('ANY_VALUE(currency) as currency'), \DB::raw('ANY_VALUE(price) as price'), \DB::raw('COUNT(1) as occurance'))->groupBy('birthday', 'currency')->orderBy('date', 'DESC')->get(); //we can do this as thereotically the prices should be the same for same date and currency.
        return ['prices' => $prices];
    }

    public function showPrices(Request $r) {
        return view('prices.list');
    }
}
