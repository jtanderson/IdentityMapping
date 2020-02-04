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
      'progress' => '20',
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }

  public function color(){
    return view('color', array(
      'progress' => '40',
      'prevURL' => route('start'),
      'nextURL' => route('survey'),
    ));
  }



  public function survey(){
    return view('survey', array(
      'progress' => '60',
      'prevURL' => route('color'),
      'nextURL' => route('demographic'),
    ));
  }

    public function demographic(){
    return view('demographic', array(
      'progress' => '80',
      'prevURL' => route('survey'),
      'nextURL' => route('end'),
    ));
  }

    public function end(){
    return view('end', array(
      'progress' => '100',
      'nextURL' => route('end'),
      'prevURL' => '',
    ));
  }

}
