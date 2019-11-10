<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SurveyController extends Controller{
  public function start(){
    return view('start', array());
  }
}
