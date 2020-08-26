<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyQuestions extends Model
{
    //
    protected $table = 'surveyquestion';

    protected $fillable = ['text', 'extreme_left', 'extreme_right'];

    protected $attributes = [ 
    	'extreme_left' => 'Strongly Disagree',
    	'extreme_right' => 'Strongly Agree',
    	'degrees' => 7
    	];

}
