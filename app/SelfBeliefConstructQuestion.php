<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelfBeliefConstructQuestion extends Model
{
  protected $table = 'self_belief_construct';

  protected $fillable = ['text', 'extreme_left', 'extreme_right', 'degrees'];

  protected $attributes = [ 
    'text' => '',
    'extreme_left' => '',
    'extreme_right' => '',
    'degrees' => 7,
    'active' => true
  ];

  public function selfBeliefConstructAnswer(){
    return $this->hasMany('App\SelfBeliefConstructAnswer');
  }
}
