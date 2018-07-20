<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test_name extends Model
{
      	public function school()
    	{
    		return $this->hasMany('App\School');
    	}
}
