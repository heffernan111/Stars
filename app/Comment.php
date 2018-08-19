<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'content','image_id',
    ]; 

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function image()
    {
    	return $this->belongsTo('App\Image');
    }


}
