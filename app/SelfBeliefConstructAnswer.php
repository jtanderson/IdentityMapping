<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelfBeliefConstructAnswer extends Model {

  protected $table = 'self_belief_construct_answer';

  protected $fillable = ['question_id', 'answer'];

  protected $attributes = [];
  
}
