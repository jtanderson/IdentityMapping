<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienceSurveyQuestion extends Model
{
  protected $table = 'experiencesurveyquestion';

  protected $fillable = ['text', 'extreme_left', 'extreme_right', 'degrees'];

  protected $attributes = [ 
    'extreme_left' => 'Strongly Disagree',
    'extreme_right' => 'Strongly Agree',
    'degrees' => 5,
    'active' => true
  ];
}
