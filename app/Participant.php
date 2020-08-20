<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Participant extends Model
{
    //automatically adds to participant table in DB, override: protected $table
    //$id is primary id, override: $primaryKey & autoincrements automatically
    //automatically uses updated_at and created_at

    protected $attributes = [
    	'intersection_meaning' => "",
    ];

    protected $table = 'participant';

    // protected $id = 'session_token';

    public function getCircles(){
      $circles = [
        1 => $this->hasMany('\App\Circle')->where('number', '1')->latest()->first(),
        2 => $this->hasMany('\App\Circle')->where('number', '2')->latest()->first(),
        3 => $this->hasMany('\App\Circle')->where('number', '3')->latest()->first(),
        4 => $this->hasMany('\App\Circle')->where('number', '4')->latest()->first(),
        5 => $this->hasMany('\App\Circle')->where('number', '5')->latest()->first(),
      ];

      return $circles;
    }

    public function getIntersections(){
      $circles = $this->getCircles();
      $circle_ids = array_map(function($circ){ return isset($circ) ? $circ->id : null; }, $circles);
      Log::info($circle_ids);
      
      // Assumption: an intersection cannot be tied to an "outdated" version of a circle
      // So, any intersection related to a 'latest' circle, is valid. There are no "versions"
      // of any intersections between circles. They are immutable.
      return DB::table('intersection')
              ->whereIn('circle1_id', $circle_ids)
              ->whereIn('circle2_id', $circle_ids)
              ->where(function($query) use ($circle_ids) {
                $query->whereNull('circle3_id')
                      ->orWhereIn('circle3_id', $circle_ids);
              })
              ->where(function($query) use ($circle_ids) {
                $query->whereNull('circle4_id')
                      ->orWhereIn('circle4_id', $circle_ids);
              })
              ->where(function($query) use ($circle_ids) {
                $query->whereNull('circle5_id')
                      ->orWhereIn('circle5_id', $circle_ids);
              })
              ->get()
              ->unique(); // needed? Possibly, have to check with how JS creates the ids.

    }

    public function deleteAll(){

      //array of circles 
      $circlesArr = $this->hasMany('\App\Circle');
      foreach($circlesArr as $circle){

        $circle->delete();
      }

    }

}
