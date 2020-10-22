<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadOrGetFileTrait;

class Image extends Model
{
    use UploadOrGetFileTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link', 'image_type_id'
    ];

    public function type()
    {
        return $this->belongsTo(ImageType::class, 'image_type_id');
    }

    public function myLink()
    {
        $link = $this->getFile($this->link);

        if ($link != null) {
            return $link;
        }

        return "";
    }

    public function deleteImageFile()
    {
        $this->deleteFile($this->link);
    }
}
