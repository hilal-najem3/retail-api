<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Gets the Id of an Image Type from its name
     * 
     * @param  string $name
     * @return int     
     */
    public static function getIdByName(string $name)
    {
    	$imageType = ImageType::where('name', $name)->get()->first();

    	if ($imageType != null) {
    		return $imageType->id;
    	}

    	return null;
    }
}
