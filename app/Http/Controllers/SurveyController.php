<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller{
  public function start(Request $request){
    // make sure there is a session
    $request->session()->regenerate();
    // TODO: generate a uniqe session_id and save it here
    $request->session()->put('session_id', 'lkjsdflksjdflkj');


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
    // TODO: Parse the request object ($request) into the correct
    // format for the "circle" table
    // TODO: Use DB::table('circle')->insert($arrOfParseData)
    // (or) use DB::table('cirlce')->where('id', $somethingYouHaveToCompute)->update($arrOfData)
    
  }

  public function position(Request $request){
    // TODO:
    // - check if this session key is associated to a particpant
    //    - if not, add them to the participant table
    //    - if yes, check if the user has circles in-progress and load them

    $sessKey = $request->session()->get('session_id');
    $data = $request->session()->all();
    Log::info(print_r($data, true));

    Log::info("Position with key" . $sessKey);

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

