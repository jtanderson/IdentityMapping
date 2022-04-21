<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpatialHabitQuestion extends Model
{
  protected $table = 'spatial_habits_question';

  protected $fillable = ['text', 'extreme_left', 'extreme_right', 'degrees'];

  protected $attributes = [ 
    'text' => '',
    'extreme_left' => '',
    'extreme_right' => '',
    'degrees' => 7,
    'active' => true
  ];

  public function spatialHabitAnswer(){
    return $this->hasMany('App\SpatialHabitAnswer');
  }
}
