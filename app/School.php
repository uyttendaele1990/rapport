<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
      	public function student()
    	{
    		return $this->belongsTo('App\student');
    	}

      	public function categorie()
    	{
    		return $this->belongsTo('App\categorie');
    	}
    
      	public function test()
    	{
    		return $this->belongsTo('App\test');
    	}	

        public function test_name()
      {
        return $this->belongsTo('App\test_name');
      } 
}
 