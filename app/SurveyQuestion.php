<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyQuestion extends Model
{
  protected $table = 'surveyquestion';

  protected $fillable = ['text', 'extreme_left', 'extreme_right', 'degrees', 'surveyable_type'];

  protected $attributes = [ 
    'extreme_left' => 'Strongly Disagree',
    'extreme_right' => 'Strongly Agree',
    'degrees' => 5,
    'active' => true
  ];

  public function surveyAnswers(){
    return $this->hasMany('App\SurveyAnswer');
  }
}
