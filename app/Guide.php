<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{

	protected $fillable = [
        'user_id', 'name', 'desc', 'file_name','path','tags',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }


}
