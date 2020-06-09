<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //automatically adds to participant table in DB, override: protected $table
    //$id is primary id, override: $primaryKey & autoincrements automatically
    //automatically uses updated_at and created_at

    protected $attributes = [
    	'intersection_meaning' => "",
    ];

    protected $table = 'participant';

    public function getCircles(){
      $circlesArr = $this->hasMany('\App\Circle');
      $circles = [
        '1' => $this->hasMany('\App\Circle')->where('number', '1')->latest()->first(),
        '2' => $this->hasMany('\App\Circle')->where('number', '2')->latest()->first(),
        '3' => $this->hasMany('\App\Circle')->where('number', '3')->latest()->first(),
        '4' => $this->hasMany('\App\Circle')->where('number', '4')->latest()->first(),
        '5' => $this->hasMany('\App\Circle')->where('number', '5')->latest()->first(),
      ];

      return $circles;
    }
}
