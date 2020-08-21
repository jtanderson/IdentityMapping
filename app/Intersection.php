<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Intersection extends Model
{
     protected $table = 'intersection';

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
