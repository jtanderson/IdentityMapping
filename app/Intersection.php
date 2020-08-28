<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Intersection extends Model
{
     protected $table = 'intersection';

     protected $attributes = [
       'explanation' => ''
     ];

     public function circle1(){
       return $this->belongsTo('App\Circle', 'circle1_id');
     }

     public function circle2(){
       return $this->belongsTo('App\Circle', 'circle2_id');
     }

     public function circle3(){
       return $this->belongsTo('App\Circle', 'circle3_id');
     }

     public function circle4(){
       return $this->belongsTo('App\Circle', 'circle4_id');
     }

     public function circle5(){
       return $this->belongsTo('App\Circle', 'circle5_id');
     }

     public static function getByCircleIds($circle_ids){
       $query = \App\Intersection::where('circle1_id', $circle_ids[0])
                  ->where('circle2_id', $circle_ids[1]);
       for($i = 2; $i < 5; $i++){
         if($i < count($circle_ids)){
           $query = $query->where('circle'.($i+1).'_id', $circle_ids[$i]);
         } else {
           $query = $query->whereNull('circle'.($i+1).'_id');
         }
       }
       return $query->first();
     }
}
