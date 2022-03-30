<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HarmonyAnswer extends Model {

  protected $table = 'harmonyquestionintersectionanswer';

  protected $fillable = ['question_id', 'answer'];

  protected $attributes = [];
  
}
