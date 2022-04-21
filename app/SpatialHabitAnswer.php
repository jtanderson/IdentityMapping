<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpatialHabitAnswer extends Model {

  protected $table = 'spatial_habits_answer';

  protected $fillable = ['question_id', 'answer'];

  protected $attributes = [];
  
}
