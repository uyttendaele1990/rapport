<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function school()
    	{
    		return $this->hasMany('App\School');
    	}
}
