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

  public function getIntersect(){

    //array_map walks through array received by getIntersectId() and applies function at each element of array
    $id = array_map(function($val){ return $val->maxid;}, $this->getIntersectId());

    //$id is an array

    //below statement returns a collection of intersection objects 

    return DB::table('intersection')
      ->whereIn('id', $id)->get();
  }

  public function getIntersectId(){
    // $ids = DB::select('select max(id) from intersection where `circle1_id` = :id OR `circle2_id` = :id OR `circle3_id` = :id OR `circle4_id` = :id OR `circle5_id` = :id group by circle1_id, circle2_id, circle3_id, circle4_id, circle5_id', ['id' => $this->id]);
    $ids = DB::table('intersection')
      ->select(DB::raw('max(id) as maxid'))
      ->where('circle1_id', $this->id)
      ->orWhere('circle2_id', $this->id)
      ->orWhere('circle3_id', $this->id)
      ->orWhere('circle4_id', $this->id)
      ->orWhere('circle5_id', $this->id)
      ->groupBy('circle1_id', 'circle2_id', 'circle3_id', 'circle4_id', 'circle5_id')
      ->get()
      ->toArray();
    return $ids;
  }

  public function surveyAnswers(){
    return $this->morphMany('App\SurveyAnswer', 'surveyable');
  }

  public function category(){
    return $this->belongsTo('App\Category');
  }
}
