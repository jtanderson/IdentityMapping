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
   			$intersection1 = \DB::table('intersection')->where('circle1_id', $this->id)->first(),
    		$intersection2 = \DB::table('intersection')->where('circle2_id', $this->id)->first(),
    		$intersection3 = \DB::table('intersection')->where('circle3_id', $this->id)->first(),
			  $intersection4 = \DB::table('intersection')->where('circle4_id', $this->id)->first(),
	    	$intersection5 = \DB::table('intersection')->where('circle5_id', $this->id)->first(),
   		];

   		return $intersections; 	
    }
    

}
