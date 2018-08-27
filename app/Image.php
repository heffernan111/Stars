<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'file_name','path',
    ]; 

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

}
