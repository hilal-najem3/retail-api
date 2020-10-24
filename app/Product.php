<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'barcode', 'size_id', 'color_id', 'collection_id',
    ]

    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }

    public function size()
    {
        return $this->belongsTo('App\Size');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
