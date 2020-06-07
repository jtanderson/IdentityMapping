<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller{

  public function __construct(){
    $this->middleware('participant');
  }

  public function start(Request $request){

    return view('start', array(
      'progress' => '0',
      'prevURL' => '',
      'nextURL' => route('position'),
    ));
  }

  public function position(Request $request){

    //TODO: check if the user has circles in-progress and load them USING PARTICIPANT & CIRCLES CLASS

    $sessId = $request->session()->getId();

    $participant = \App\Participant::where('session_token', $sessId);

    //does this pull all the data we need?
    //What we want: ALL circles & their data with participant_id being the same as the current session
    
    $circles = \App\Circle::where('participant_id', $participant);

    // if($circles){
    //   //inline JS load circles into paper using (blade)
    // }else{
    //   //return default circles i.e. empty
    // }

    return view('position', array(
      'progress' => '10',
      'circles' => $circles,
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }

  public function color(Request $request){
    
    /*
    DB::table('circle')->insertGetId([
      ['color' => $request->input('color')],
      ['line_style' => $request->input('line_style')]
    ]);
     */


    // TODO: 
    //select from DB where user_id is the user. 
    //Load the circle into an array, then pass that array of circle data
    // to the view so that they can be inserted into the canvas by javascript

    // "group by" number and ***** "order by" created_at, then take only the top of each group (first())

    // $circleArray = DB::table('circle')->where('participant_id', $request->session->get('participant_id'))->first();


    //Log::info(print_r($request,true));
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

    //on right is AJAX left is database
    /*
    DB::table('circle')->insertGetId([
      'number' => $request->input('number'),
      'center_x' => $request->input('position_x'),
      'center_y' => $request->input('position_y'),
      'label' => $request->input('label'),
      'radius' => $request->input('radius'),
      'color' => $request->input('color') ?? "",
      'line_style' => $request->input('line_style') ?? "",
      'participant_id' => $request->session()->get('participant_id') //$request->session()->getId()
    ]);
     */

    $circle = new \App\Circle;
    $circle->label = $request->input('label');
    $circle->number = $request->input('number');
    $circle->center_x = $request->input('position_x');
    $circle->center_y = $request->input('position_y');
    $circle->radius = $request->input('radius');
    $circle->color = $request->input('color','');
    $circle->line_style = $request->input('line_style','');
    $circle->participant_id = $request->session()->get('participant_id','');

    Log::info($circle);

    $circle->save();
  }

  public function saveIntersectData(Request $request){
    Log::info("Saving intersection data...");
    Log::info($request);

    DB::table('intersection')->insertGetId([
        ['created_at' => $request->input('')],
        ['updated_at' => $request->input('')],
        ['circle1_id' => $request->input('')],
        ['circle2_id' => $request->input('')],
        ['color' => $request->input('')],
        ['area' => $request->input('')],
    ]);

  }

//intersection survey
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

