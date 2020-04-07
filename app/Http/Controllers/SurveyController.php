<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SurveyController extends Controller{
  public function start(){
    return view('start', array(
      'progress' => '0',
      'prevURL' => '',
      'nextURL' => route('position'),
    ));
  }

  // only for AJAX endpoint
  public function saveCircleData(Request $request){
    Log::info("HERE");
    Log::info($request);
    // TODO: Save request data to appropriate database tables
    
  }

  public function position(Request $request){
    // TODO:
    // - check if the user has circles in-progress and load them, if yes

    Log::info("Request:");
    Log::info($request->fullUrl());
    //Log::info(print_r($request,true));

    return view('position', array(
      'progress' => '10',
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }

  public function color(Request $request){
    // TODO:
    // - save the user circles to the database
    // - render them to the coloring canvas
    Log::info(print_r($request,true));
    return view('color', array(
      'progress' => '20',
      'prevURL' => route('position'),
      'nextURL' => route('intersections'),
    ));
  }

  public function intersections(){
    return view('intersections', array(
      'progress' => '40',
      'prevURL' => route('color'),
      'nextURL' => route('survey'),
    ));
  }

  public function survey(){
    return view('survey', array(
      'progress' => '60',
      'prevURL' => route('color'),
      'nextURL' => route('category'),
    ));
  }

  public function category(){
    return view('grouping', array(
      'progress' => '70',
      'prevURL' => route('survey'),
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

  // public function survey(){
  //   return view('survey', array(
  //     'progress' => '100',
  //     'prevURL' => route('intersections'),
  //     'nextURL' => route('demographics'),
  //   ));
  // }
  // public function deomographics(){
  //   return view('demographics', array(
  //     'progress' => '100',
  //     'prevURL' => route('survey'),
  //     'nextURL' => route('grouping'),
  //   ));
  // }
  // public function grouping(){
  //   return view('grouping', array(
  //     'progress' => '100',
  //     'prevURL' => route('demographics'),
  //     'nextURL' => route('finished'),
  //   ));
  // }
  // public function finished(){
  //   return view('finished', array(
  //     'progress' => '100',
  //     'prevURL' => route('grouping'),
  //   ));
  // }

