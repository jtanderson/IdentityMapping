<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyPage extends Model
{
  protected $table = 'surveypage';

  protected $fillable = ['header', 'description', 'active', 'order'];

  protected $attributes = [
    'header' => "",
    'description' => "",
    'active' => true,
    'order' => 1,
  ];

  public function surveyPages(){
    return $this->hasMany('App\SurveyPage');
  }
}
