<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $activeQuestions = \App\surveyquestion::where('active', 1)->count();
        $totalSessions = \App\Sessions::all()->count();
        $categoryCount = \App\Category::where('active', true)->count();
        $circleLabels = DB::table('circle')
                      ->select(DB::raw('label'), DB::raw('count(*) as count'))
                      ->groupBy('label')
                      ->orderBy('count', 'desc')
                      ->take(5)
                      ->get();

        $mostFrequentCircleLabels = [];
        foreach ($circleLabels as $circleLabel) {
            array_push($mostFrequentCircleLabels, $circleLabel->label); 
        } 

        $circleLabelCount = \App\Circle::all()->groupBy('label')->count();
        return view('admin', array(
          'activeQuestions' => $activeQuestions,
          'totalSessions' => $totalSessions,
          'circleLabelCount' => $circleLabelCount, 
          'circleLabels' => $mostFrequentCircleLabels,
          'categoryCount' => $categoryCount,
        ));
    }

    public function contentEditPage() {
      
      return view('content', array(
        'contents' => \App\TextContent::all()
      ));
    }

    public function dataProcessingPage() {
      return view('data');
    }

    public function pageManagerPage() {
      Log::info(\App\surveypage::all());
      return view('pagemanager', array(
        'pages' => \App\surveypage::all()
      ));
    }

    public function getData() {
      return 1;
    }

  public function categoryEditPage() {
      
      return view('admineditcategory', array(
        'category' => \App\Category::all()
      ));
    }

    public function surveyquestionEditPage() {
      $activeQuestions = \App\surveyquestion::where('active', 1)->count();
      return view('surveyquestion', array(
        'activeQuestions' => $activeQuestions, 
      ));
    }

    public function updateSurveyQuestion($id, Request $request){

      // The ID will be 0 if this is updating a new question

      $question = \App\surveyquestion::create($request->all());

      Log::info($question); // Prints out the question object as an eloquent object

      if( $question->id ){
        $oldQ = \App\surveyquestion::find($id);

        if ($oldQ) {
          $oldQ->active = false;
          $oldQ->save();
        }
        
        return $question;
      
      } else {
        
        return \App\surveyquestion::find($id);
      
      }

    }


    public function updateCategory($id, Request $request){

      // The ID will be 0 if this is updating a new question

      $category = \App\Category::create($request->all());

      if( $category->id ){
        $oldC = \App\Category::find($id);

        if ($oldC) {
          $oldC->active = false;
          $oldC->save();
        }
        
        return $category;
      
      } else {
        
        return \App\Category::find($id);
      
      }

    }






    /**
     * 
     * Add a new question to the pool of questions in the database, this question is rendered in the admin dashboard for editing
     * 
     * @return \App\surveyquestion
     * 
     */

    public function newSurveyQuestion(Request $request) {

      $question = \App\surveyquestion::create($request->all()); // Create a new eloquent object survey question
      Log::info($request);
      Log::info($question);
      $question->active = true; // set it to active
      $question->save(); // save it to the db
      return $question; // return the question to the Vue component

    }

    public function newCategory(Request $request) {

      $category = \App\Category::create($request->all()); // Create a new eloquent object survey question
      $category->active = true; // set it to active
      $category->save(); // save it to the db
      return $category; // return the question to the Vue component

    }

    public function removeSurveyQuestion($id){
      $question = \App\surveyquestion::find($id);
      $question->active = false;
      $question->save();
    }

    public function removeCategory($id){
      $category = \App\Category::find($id);
      $category->active = false;
      $category->save();
    }

    public function surveyQuestions(){
      return \App\surveyquestion::where('active', true)->get();
    }

    public function getCategories(){
      return \App\Category::where('active', true)->get();
    }

    function updateTextContent($key, Request $request) {
      $content = \App\TextContent::where('key', $key)->first();
      Log::info($request->all());
      $newContent = $request->content;
      $content->content = $newContent;
      $content->save();
      return $content;
    }

    function addPage(Request $request) {
      $page = \App\SurveyPage::create($request->all()); 
      Log::info($request);
      Log::info($page);
      $page->active = true;
      $page->save();
      return $page; 
    }

    function updatePage($id, Request $request) {
      $page = \App\SurveyPage::where('id', $id)->first();
      Log::info($request->all());
      $newContent = $request->content;
      $content->content = $newContent;
      $content->save();
      return $content;
    }

    function deletePage($id) {
      $page = \App\SurveyPage::find($id);
      $page->active = false;
      $page->save();
    }

    function editPage() {

    }

    function getNumberOfPages() {
      $numPages = \App\SurveyPage::all()->count();
      return $numPages;
    }

    function getAllPages() {
      $allPages = \App\SurveyPage::all();
      return $allPages;
    }
}
