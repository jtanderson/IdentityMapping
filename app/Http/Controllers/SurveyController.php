<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller{
  public function start(Request $request){

    // TODO: move this to a custom "middleware"
    // make sure there is a session
    // OR, verify that this is unecessary (I think it might be)
    //if(!$request->session()){
      //$request->session()->regenerate();
    //}

    return view('start', array(
      'progress' => '0',
      'prevURL' => '',
      'nextURL' => route('position'),
    ));
  }

  public function position(Request $request){
    // TODO:
    // - check if this session key is associated to a particpant
    //    - if not, add them to the participant table
    //    - if yes, check if the user has circles in-progress and load them

    // note: this should exist, in theory, but could use middleware to make sure
    $sessId = $request->session()->getId();
    Log::info("session id: " .  $sessId);

    return view('position', array(
      'progress' => '10',
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }

  public function color(Request $request){
    
    DB::table('circle')->insertGetId([
      
      ['color' => 'color'],
      ['line_style' => 'line_style']
    ]);


    Log::info(print_r($request,true));
    return view('color', array(
      'progress' => '20',
      'prevURL' => route('position'),
      'nextURL' => route('intersections'),
    ));
  }


  // only for AJAX endpoint
  public function saveCircleData(Request $request){
    Log::info("Saving circle data...");
    Log::info($request);

    //on right is AJAX right is database
    DB::table('circle')->insertGetId([
      ['position_x' => 'center_x'],
      ['position_y' => 'center_y'],
      ['label' => 'label'],
      ['radius' => 'radius'],
      ['color' => 'color'],
      ['line_style' => 'line_style'],
      [$request->session()->get('key') => 'participant_id']
    ]);

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

