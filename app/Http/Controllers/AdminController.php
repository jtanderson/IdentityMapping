<?php

namespace App\Http\Controllers;

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
      $question = \App\SurveyQuestion::create($request->all());

      if( $question->id ){
        $oldQ = \App\SurveyQuestion::find($id);
        $oldQ->active = false;
        $oldQ->save();
        return $question;
      } else {
        return \App\SurveyQuestion::find($id);
      }

    }

    public function removeSurveyQuestion($id, Request $request){
      $question = \App\SurveyQuestion::find($id);
      $question->active = false;
      $question->save();
    }

    public function surveyQuestions(){
      return \App\SurveyQuestion::where('active', true)->get();
    }
}
