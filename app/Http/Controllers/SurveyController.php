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
    return view('intersections', array(
      'progress' => '80',
      'prevURL' => route('color'),
      'nextURL' => route('survey'),
    ));
  }
  public function survey(){
    return view('survey', array(
      'progress' => '100',
      'prevURL' => route('intersections'),
      'nextURL' => route('demographics'),
    ));
  }
  public function deomographics(){
    return view('demographics', array(
      'progress' => '100',
      'prevURL' => route('survey'),
      'nextURL' => route('grouping'),
    ));
  }
  public function grouping(){
    return view('grouping', array(
      'progress' => '100',
      'prevURL' => route('demographics'),
      'nextURL' => route('finished'),
    ));
  }
  public function finished(){
    return view('finished', array(
      'progress' => '100',
      'prevURL' => route('grouping'),
    ));
  }
}
