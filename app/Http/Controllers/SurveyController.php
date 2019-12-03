<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SurveyController extends Controller{
  public function start(){
    return view('start', array(
      'progress' => '0',
      'prevURL' => '',
      'nextURL' => route('position'),
    ));
  }

  public function position(){
    return view('position', array(
      'progress' => '40',
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }

  public function color(){
    return view('color', array(
      'progress' => '60',
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }
  public function intersections(){
    return view('color', array(
      'progress' => '80',
      'prevURL' => route('color'),
      'nextURL' => route('survey'),
    ));
  }
}
