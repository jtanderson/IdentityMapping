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

    public function deleteAll(){

      //array of circles 
      $circlesArr = $this->hasMany('\App\Circle');
      foreach($circlesArr as $circle){

        $circle->delete();
      }

    }

}
