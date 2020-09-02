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

    $currentIntersections = $participant->getIntersections();
    Log::info(print_r($currentIntersections, true));

    return view('color', array(
      'progress' => '20',
      'circles' => $circles,
      'intersections' => $currentIntersections,
      // 'length' => $length,
      'prevURL' => route('position'),
      'nextURL' => route('intersectionDebrief'),
    ));
  }


  // only for AJAX endpoint
  public function saveCircleData(Request $request){
    Log::info("Saving circle data...");
    Log::info($request);

    if( $request->input('id') ){
      $circle = \App\Circle::find($request->input('id'));
    } else {
      $circle = new \App\Circle;
    }

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
    $participant = \App\Participant::find(session()->get('participant_id'));

    //split the id ex "12"

    $circles = $participant->getCircles();

    $intersections = $request->input('intersections');
    //Log::info($arr);

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

    // NB: the type-cast prevents an invalid argument exception when $arr is empty
    foreach ((Array) $intersections as $intData) {

      //$intersection = new \App\Intersection;

      // Log::info($obj);

      // local.INFO: array (
      // myapp_1    |   0 => 
      // myapp_1    |   array (
      // myapp_1    |     'intersectId' => '12',
      // myapp_1    |     'area' => '12530.66999727977',
      // myapp_1    |   ),
      // myapp_1    | )  

      //$participant->getCircles with index (number) ("") match circle number with circle id ['intersectId'][0] 

      $circle_ids = Array($circles[intval($intData['id'][0])]['id'], $circles[intval($intData['id'][1])]['id']);
      if( strlen($intData['id']) >= 3 ){
        array_push($circle_ids, $circles[intval($intData['id'][2])]['id']);
      }
      if( strlen($intData['id']) >= 4 ){
        array_push($circle_ids, $circles[intval($intData['id'][3])]['id']);
      }
      if( strlen($intData['id']) >= 5 ){
        array_push($circle_ids, $circles[intval($intData['id'][4])]['id']);
      }

      $intersection = \App\Intersection::getByCircleIds($circle_ids);

      if(empty($intersection)){
        $intersection = new \App\Intersection;
        foreach($circle_ids as $i => $id){
          $intersection['circle'.($i+1).'_id'] = $id;
        }
      }

      $intersection->color = $intData['color'];
      $intersection->area = $intData['area'];
      if( array_key_exists('line_style', $intData) ){
        $intersection->line_style = $intData['line_style'];
      }
      $intersection->save();
    }
  }

  //request sent is the Abort button push?
  public function abort(Request $request){
    $participant = \App\Participant::find(session()->get('participant_id'));

    $participant->deleteAll();

    $participant->delete();

    return view('end', array(
      'progress' => '100',
      'nextURL' => '',
      'prevURL' => '',
    ));
  }

  //intersection survey
  public function intersectionDebrief(){

    $participant = \App\Participant::find(session()->get('participant_id'));

    $circles = $participant->getCircles();

    foreach ($circles as $circle){

      $intersections = $participant->getIntersections();

      Log::info($intersections);

      foreach($intersections as $intersect){
        $intersect['viewLabel'] = join(
          array_filter([
            $intersect->circle1->label,
            $intersect->circle2->label,
            $intersect->circle3 ? $intersect->circle3->label : "",
            $intersect->circle4 ? $intersect->circle4->label : "",
            $intersect->circle5 ? $intersect->circle5->label : "",
          ]), // NB: with default callback, removes FALSE-y values
          '-');
      }
    }

    return view('/intersectionDebrief', array(
      'progress' => '40',
      'intersections' => $intersections,
      'meaning' => $participant->intersection_meaning,
      'prevURL' => route('color'),
      'nextURL' => route('identityDebrief'),
    ));
  }

  public function saveMeaning(Request $request){
    $participant = \App\Participant::find(session()->get('participant_id'));

    $participant->intersection_meaning = $request->input('meaningText');

    $participant->save();
  }

  public function saveSurveyQuestion(Request $request){
    $question = \App\SurveyQuestion::find($request->question_id);
    \App\SurveyAnswer::updateOrCreate(
      ['surveyquestion_id' => $question->id,
       'surveyable_type'   => $request->surveyable_type,
       'surveyable_id'     => $request->surveyable_id ],
      ['answer' => $request->answer]
    );
  }

  public function saveExplanation(Request $request){
    $participant = \App\Participant::find(session()->get('participant_id'));
    $intersection = \App\Intersection::find($request->input('id'));
    $intersection->explanation = $request->input('explanation');
    $intersection->save();
  }

  public function identityDebrief(){

    $participant = \App\Participant::find(session()->get('participant_id'));
    $circles = array_filter($participant->getCircles());
    $circleIds = array_map(function($obj){ return $obj->id; }, $circles);
    $surveyquestions = \App\SurveyQuestion::where('surveyable_type', 'circle')->get();
    $surveyanswers = \App\SurveyAnswer::where('surveyable_type', 'circle')
      ->whereIn('surveyable_id', $circleIds)
      ->get();

    // store the answer values on the question for the view
    foreach( $surveyanswers as $answer ){
      // an answer must have a question :)
      $question = $surveyquestions->find($answer->surveyquestion_id);
      $question->answer = $answer->answer;
    }
    

    return view('identityDebrief', array(
      'progress' => '60',
      'circles' => $circles,
      'surveyquestions' => $surveyquestions,
      'prevURL' => route('intersectionDebrief'),
      'nextURL' => route('category'),
    ));
  }

  public function category(){
    $participant = \App\Participant::find(session()->get('participant_id'));
    $circles = array_filter($participant->getCircles());
    $categories = \App\Category::all();

    return view('category', array(
      'circles' => $circles,
      'categories' => $categories,
      'progress' => '70',
      'prevURL' => route('identityDebrief'),
      'nextURL' => route('demographic'),
    ));
  }

  public function saveCategeory(Request $request){
    $circle = \App\Circle::find($request->circle_id);
    $circle->category_id = $request->category_id;
    $circle->save();
  }

  public function demographic(){
    return view('demographic', array(
      'progress' => '80',
      'prevURL' => route('categroy'),
      'nextURL' => route('end'),
    ));
  }

  public function end(){
    return view('end', array(
      'progress' => '100',
      'nextURL' => '',
      'prevURL' => '',
    ));
  }
}
?>
