<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'symbol',
    ];

    public static function getCurrencyBySymbol($symbol)
    {
        $currency = Currency::where('symbol', $symbol)->get()->first();

        return $currency;
    }

    public static function getIdBySymbol($symbol)
    {
    	$currency = Currency::where('symbol', $symbol)->get()->first();

    	return $currency->id;
    }
}
