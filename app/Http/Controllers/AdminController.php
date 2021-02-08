<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Queries the database to get the number of questions that are currently active
    * @return int
    */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activeQuestions = \App\SurveyQuestion::where('active', 1)->count();
        return view('admin', array(
          'activeQuestions' => $activeQuestions,
        ));
    }

    public function updateSurveyQuestion($id, Request $request){

      // The ID will be 0 if this is updating a new question

      $question = \App\SurveyQuestion::create($request->all());

      Log::info($question); // Prints out the question object as an eloquent object

      if( $question->id ){
        $oldQ = \App\SurveyQuestion::find($id);

        if ($oldQ) {
          $oldQ->active = false;
          $oldQ->save();
        }
        
        return $question;
      
      } else {
        
        return \App\SurveyQuestion::find($id);
      
      }

    }

    /**
     * 
     * Add a new question to the pool of questions in the database, this question is rendered in the admin dashboard for editing
     * 
     * @return \App\surveyQuestion
     * 
     */

    public function newSurveyQuestion(Request $request) {

      $question = \App\surveyQuestion::create($request->all()); // Create a new eloquent object survey question
      Log::info($request);
      Log::info($question);
      $question->active = true; // set it to active
      $question->save(); // save it to the db
      return $question; // return the question to the Vue component

    }

    public function removeSurveyQuestion($id){
      $question = \App\SurveyQuestion::find($id);
      $question->active = false;
      $question->save();
      
    }

    public function surveyQuestions(){
      return \App\SurveyQuestion::where('active', true)->get();
    }
}
