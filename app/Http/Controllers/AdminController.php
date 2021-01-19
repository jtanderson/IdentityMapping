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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
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












     // public function newSurveyQuestion($id, Request $request) {

    //   $question = \App\surveyQuestion::create($request->all());

    //   //$oldQ = \App\SurveyQuestion::find($id);
    
    //   $question->active = true;
    //   // Apparently, you can't set the id of the question below, I am assuming this is because the ID does not exist yet, therefore you cannot change it and it is given a default id of the incorrect number
    //   // $question->id = $id; // I'm not sure why we need to do this, but if we do not, when get a number that is not the correct id. $id is from the url path which is the correct id
    //   $question->save();
    //   return $question;

    // }


    public function removeSurveyQuestion($id, Request $request){
      $question = \App\SurveyQuestion::find($id);
      $question->active = false;
      $question->save();
    }

    public function surveyQuestions(){
      return \App\SurveyQuestion::where('active', true)->get();
    }
}
