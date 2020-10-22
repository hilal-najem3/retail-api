<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'details', 
        'available', 'featured', 'quantity', 
        'head_price', 'head_price_currency_id', 
        'price', 'price_currency_id',
        'sale_id', 'user_id',
        'parent_id',
    ];
}
