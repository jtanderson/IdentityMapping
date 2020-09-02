<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyAnswer extends Model {
  protected $table = 'surveyanswer';

  protected $fillable = ['surveyquestion_id', 'surveyable_id', 'surveyable_type', 'answer'];

  protected $attributes = [];
}
