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

    $participant = \App\Participant::find(session()->get('participant_id'));
    
    $circles = $participant->getCircles();

    return view('position', array(
      'progress' => '10',
      'circles' => $circles,
      'prevURL' => route('start'),
      'nextURL' => route('color'),
    ));
  }

  public function color(Request $request){
    
    $participant = \App\Participant::find(session()->get('participant_id'));
    
    $circles = $participant->getCircles();

    return view('color', array(
      'progress' => '20',
      'circles' => $circles,
      'prevURL' => route('position'),
      'nextURL' => route('intersections'),
    ));
  }


  // only for AJAX endpoint
  public function saveCircleData(Request $request){
    Log::info("Saving circle data...");
    Log::info($request);

    $circle = new \App\Circle;
    $circle->label = $request->input('label');
    $circle->number = $request->input('number');
    // $circle->dbid = $request->input('dbid');
    $circle->center_x = $request->input('position_x');
    $circle->center_y = $request->input('position_y');
    $circle->radius = $request->input('radius');
    $circle->color = $request->input('color','');
    //needs a sort of test (not NULL) OR
    //can also be nullable()?
    // & make sure everything is OK with it
    $circle->line_style = $request->input('line_style','');
    $circle->participant_id = $request->session()->get('participant_id','');

    Log::info($circle);

    $circle->save();
  }

  public function saveIntersectData(Request $request){
    Log::info("Saving intersection data...");
    Log::info($request);

    $participant = \App\Participant::find(session()->get('participant_id'));

    //split the id ex "12"

    $circles = $participant->getCircles();

    $arr = $request->input('intersections');
    Log::info($arr);

//intersections passed from layering.js (saveIntersect())

//     //local.INFO: array (
// myapp_1    |   'intersections' => 
// myapp_1    |   array (
// myapp_1    |     0 => 
// myapp_1    |     array (
// myapp_1    |       'id' => '12',
// myapp_1    |       'area' => '5316.506290736899',
// myapp_1    |     ),
// myapp_1    |   ),
// myapp_1    | ) 

    foreach ($arr as $obj) {

      $intersection = new \App\Intersection;

      // Log::info($obj);

// local.INFO: array (
// myapp_1    |   0 => 
// myapp_1    |   array (
// myapp_1    |     'id' => '12',
// myapp_1    |     'area' => '12530.66999727977',
// myapp_1    |   ),
// myapp_1    | )  

      //$participant->getCircles with index (number) ("") match circle number with circle id ['id'][0] 
      //!!!!!!!! & get actual dbid

      $findid1 = $obj['id'][0];
      Log::info($findid1); 
      $index1 = intval($findid1);

      $findid2 = $obj['id'][1];
      Log::info($findid2);
      $index2 = intval($findid2);

      $intersection->circle1_id = $circles[$index1]['id'];
      $intersection->circle2_id = $circles[$index2]['id'];

      if(strlen($obj['id']) >= 3){
        $findid3 = $obj['id'][2];
        $index3 = intval($findid3);
        $intersection->circle3_id = $circles[$index3]['id'];
      }

      if(strlen($obj['id']) >= 4){
        $findid4 = $obj['id'][3];
        $index4 = intval($findid4);
        $intersection->circle4_id = $circles[$index4]['id'];
      }

      if(strlen($obj['id']) >= 5){
        $findid5 = $obj['id'][4];
        $index5 = intval($findid5);
        $intersection->circle5_id = $circles[$index5]['id'];
      }

      
      $intersection->color = $request->input('color', '');
      $intersection->area = $obj['area'];

      $intersection->save();

      Log::info($intersection);

// local.INFO: array (
// myapp_1    |   'id' => '12',
// myapp_1    |   'area' => '12530.66999727977',
// myapp_1    | )  

    
    }

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

