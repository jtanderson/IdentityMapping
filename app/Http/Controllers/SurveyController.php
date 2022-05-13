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

  public function consent(Request $request){

    return view('consent', array(
      'progress' => '0',
      'prevURL' => '',
      'nextURL' => route('start'),
    ));
  }

  public function start(Request $request) {

    return view('start', array(
      'progress' => '0',
      'prevURL' => route('consent'),
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

  public function selfBelief(Request $request){

    $selfBeliefQuestions = \App\SelfBeliefConstructQuestion::where('active', true)->get();

    return view('selfbelief', array(
      'progress' => '35',
      'selfbeliefquestions' => $selfBeliefQuestions,
      'prevURL' => route('experiencesurvey'),
      'nextURL' => route('spatialHabit'),
    ));
  }

  public function spatialHabit(Request $request) {
      
      $spatialHabitQuestions = \App\SpatialHabitQuestion::where('active', true)->get();
  
      return view('spatialhabit', array(
        'progress' => '40',
        'spatialhabitquestions' => $spatialHabitQuestions,
        'prevURL' => route('selfBelief'),
        'nextURL' => route('demographic'),
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

    return view('start', array(
      'progress' => '0',
      'nextURL' => route('position'),
      'prevURL' => '',
    ));
  }

  //intersection survey
  public function intersectionDebrief(){

    $participant = \App\Participant::find(session()->get('participant_id'));

    $circles = $participant->getCircles();

    $harmonyQuestions = \App\HarmonyQuestion::where('active', true)->get();

    /* $intersections = array(); */

    foreach ($circles as $circle){

      $intersections = $participant->getIntersections();

      foreach($intersections as $intersect){
        $intersect['viewLabel'] = join(
          '-',
          array_filter([ // NB: with default callback, removes FALSE-y values
            $intersect->circle1->label,
            $intersect->circle2->label,
            $intersect->circle3 ? $intersect->circle3->label : "",
            $intersect->circle4 ? $intersect->circle4->label : "",
            $intersect->circle5 ? $intersect->circle5->label : "",
          ]));
      }
  
    }

    return view('/intersectionDebrief', array(
      'progress' => '50',
      'circles' => $circles,
      'intersections' => $intersections,
      'meaning' => $participant->intersection_meaning,
      'harmonyQuestions' => $harmonyQuestions,
      'prevURL' => route('color'),
      'nextURL' => route('identityDebrief'),
    ));
  }

  public function saveMeaning(Request $request){
    $participant = \App\Participant::find(session()->get('participant_id'));

    $participant->intersection_meaning = $request->input('meaningText');

    $participant->save();
  }

  public function saveSurveyAnswer(Request $request){
    $answer = new \App\SurveyAnswer;
    $question = \App\SurveyQuestion::find($request->question_id);
    $answer->surveyquestion_id = $question->id;
    $answer->surveyable_type = $request->surveyable_type;
    $answer->surveyable_id = $request->surveyable_id;
    $answer->answer = $request->answer;
    $answer -> save();
  }

  public function saveIntersectionHarmony(Request $request) {
    $harmonyAnswer = new \App\HarmonyAnswer;
    $question = \App\HarmonyQuestion::find($request->key);
    $harmonyAnswer->question_id = $question->id;
    $harmonyAnswer->answer = $request->value;
    $harmonyAnswer->save();
  }

  public function saveSelfBeliefAnswer(Request $request) {
    $selfBeliefAnswer = new \App\SelfBeliefConstructAnswer;
    $question = \App\SelfBeliefConstructQuestion::find($request->key);
    $selfBeliefAnswer->question_id = $question->id;
    $selfBeliefAnswer->answer = $request->value;
    $selfBeliefAnswer->save();
  }

  public function saveSpatialHabitAnswer(Request $request) {
    $spatialHabitAnswer = new \App\SpatialHabitAnswer;
    $question = \App\SpatialHabitQuestion::find($request->key);
    $spatialHabitAnswer->question_id = $question->id;
    $spatialHabitAnswer->answer = $request->value;
    $spatialHabitAnswer->save();
  }

  public function saveExperienceSurveyAnswer(Request $request) {
    $experienceAnswer = new \App\ExperienceSurveyAnswer;
    $question = \App\ExperienceSurveyQuestion::find($request->key);
    $experienceAnswer->question_id = $question->id;
    $experienceAnswer->answer = $request->value;
    $experienceAnswer->save();
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
    $surveyquestions = \App\SurveyQuestion::where('active', true)->where('surveyable_type', 'circle')->get();
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

  public function experienceSurvey() {

    $participant = \App\Participant::find(session()->get('participant_id'));
    $circles = array_filter($participant->getCircles());
    $numCircles = count($circles);
    $surveyquestions = \App\ExperienceSurveyQuestion::where('active', true)->get();

    return view('experiencesurvey', array(
      'progress' => '30',
      'circles' => $circles,
      'numCircles' => $numCircles,
      'surveyquestions' => $surveyquestions,
      'prevURL' => route('category'),
      'nextURL' => route('selfBelief')
    ));
  }

  public function category(){
    $participant = \App\Participant::find(session()->get('participant_id'));
    $circles = array_filter($participant->getCircles());
    $categories = \App\Category::where('active', true)->get();

    $numPages = \App\SurveyPage::where('active', 1)->count();

    // if ($numPages < 1) {
    //   $nextURL = route('demographic');
    // } else {
    //   $nextURL = route("surveypage", ['order' => 1]);
    // }

    return view('category', array(
      'circles' => $circles,
      'categories' => $categories,
      'progress' => '70',
      'prevURL' => route('identityDebrief'),
      'nextURL' => route('experiencesurvey'),
    ));
  }

  public function saveCategory(Request $request){
    $circle = \App\Circle::find($request->circle_id);
    $circle->category_id = $request->category_id;
    $circle->save();
  }

  public function demographic(){
    $numPages = \App\SurveyPage::where('active', 1)->count();
    // $prevURL = route("surveypage", ['order' => $numPages]);
    // if ($numPages == 0) {
    //   $prevURL = route('category');
    // }
    return view('demographic', array(
      'progress' => '90',
      'prevURL' => route('spatialHabit'),
      'nextURL' => route('end'),
    ));
  }

  public function surveyPage($order) {
    $page = \App\SurveyPage::where('active', 1)->where('order', $order)->first();
    $numPages = \App\SurveyPage::where('active', 1)->count();
    $prevPageID = $page->order - 1;
    $nextPageID = $page->order + 1;
    $prevURL = route("surveypage",  ['order' => $prevPageID]);
    $nextURL = route("surveypage",  ['order' => $nextPageID]);
    if ($prevPageID == 0) {
      $prevURL = route('category');
    }
    else if ($nextPageID == $numPages + 1) {
      $nextURL = route('demographic');
    }
    return view('surveypage', array(
      'progress' => '80',
      'prevURL' => $prevURL,
      'nextURL' => $nextURL,
      'page' => $page,
    ));
  }

  public function saveDemographics(Request $request){
    $participant = \App\Participant::find(session()->get('participant_id'));
    $participant->fill([$request->key => $request->value]);
    $participant->save();
  }

  public function end(){
    $participant = \App\Participant::find(session()->get('participant_id'));
    $questions = \App\SurveyQuestion::where('active', true)->where('surveyable_type', 'participant')->get();

    return view('end', array(
      'questions' => $questions,
      'participant' => $participant,
      'progress' => '100',
      'nextURL' => '',
      'prevURL' => '',
    ));
  }

  public function thanks(Request $request){
    $participant = \App\Participant::find(session()->get('participant_id'));
    $participant->finished = true;
    $participant->feedback = $request->comments;
    Log::info($participant);
    $participant->save();

    $request->session()->regenerate();

    // NOTE: the Likert questions are saved via JS before they click "Finish"

    return view('thanks', array(
      'progress' => '100',
      'nextURL' => '',
      'prevURL' => '',
    ));
  }
}
?>
