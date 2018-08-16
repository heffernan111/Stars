<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	 protected $fillable = [
        'user_id','image_name','image_description','file_name', 'url','path',
    ];


    protected $table = 'images';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
