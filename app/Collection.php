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

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
