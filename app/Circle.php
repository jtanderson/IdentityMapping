<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Circle extends Model
{
    //automatically adds to circle table in DB, override: protected $table
    //$id is primary id, override: $primaryKey & autoincrements automatically
    //automatically uses updated_at and created_at
  
    protected $table = "circle";

    //(7/28) This isn't right, can have more than one intersection, not just latest/first

    //$int = App\Intersection::where('id1', $this->id); < should return all the intersections where circle id is id1. 

    public function getIntersect(){

   		$intersections = [
   			$intersection1 = $this->hasMany('\App\Intersection', 'circle1_id')->where('id', $this->id)->first(),
    		$intersection2 = $this->hasMany('\App\Intersection', 'circle2_id')->where('id', $this->id)->first(),
    		$intersection3 = $this->hasMany('\App\Intersection', 'circle3_id')->where('id', $this->id)->first(),
  			$intersection4 = $this->hasMany('\App\Intersection', 'circle4_id')->where('id', $this->id)->first(),
	    	$intersection5 = $this->hasMany('\App\Intersection', 'circle5_id')->where('id', $this->id)->first(),
   		];

   		return $intersections; 	
    }
    

}
