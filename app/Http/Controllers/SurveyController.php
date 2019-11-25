<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SurveyController extends Controller{
  public function start(){
    return view('start', array());
  }

  public function position(){
    return view('position', array(
      'var1' => 'Grace',
      'var2' => 'Sam'
    ));
  }
}
