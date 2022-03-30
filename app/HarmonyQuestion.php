<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HarmonyQuestion extends Model
{
  protected $table = 'harmonyquestionintersection';

  protected $fillable = ['text', 'extreme_left', 'extreme_right', 'degrees'];

  protected $attributes = [ 
    'extreme_left' => '',
    'extreme_right' => '',
    'degrees' => 7,
    'active' => true
  ];

  public function harmonyAnswers(){
    return $this->hasMany('App\HarmonyAnswer');
  }
}
