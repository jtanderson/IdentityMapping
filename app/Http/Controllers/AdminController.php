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

    public function surveypageEditPage($id) {
      $page = \App\SurveyPage::where('active', 1)->where('order', $id)->first();
      return view('editsurveypage', array(
        'page' => $page,
      ));
    }

    public function updateSurveyPage($id, Request $request) {
      $newPage = \App\SurveyPage::create($request->all());
      if ($newPage->order) {
        $oldPage = \App\SurveyPage::where('active', 1)->where('order', $id);

        if ($oldPage) {
          $oldPage->active = false;
          $oldPage->save();
        }
        return $newPage;
      } else {
        return \App\SurveyPage::where('active', 1)->where('order', $id)->first();
      }

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

    /**
     * 
     * Add Survey Page that will appear in Survey after category
     * 
     * @return \App\SurveyPage
     * 
     */
    function addPage(Request $request) {
      $page = \App\SurveyPage::create($request->all()); 
      Log::info($request);
      Log::info($page);
      $page->active = true;
      $page->save();
      return $page; 
    }

    /**
     * 
     * Soft delete a page that is currently active
     * 
     * @return void
     * 
     */
    function deletePage($order) {
      // Have to do ->first() as ->get() is a collection and you cannot do ->save() on a collection, 
      // only a single eloquent object, not a collection.
      $page = \App\SurveyPage::where('active', 1)->where('order', $order)->first();
      $page->active = false;
      $page->order = 0;
      $page->save();
      $this->updateOrderAfterDelete();
    }

    /**
     * 
     * Edit the content of the Survey Page
     * 
     * @return void
     * 
     */
    function editPage() {

    }

    /**
     * 
     * Update the order of the pages
     * 
     * @return void
     * 
     */
    function changeOrder($oldOrder, $newOrder) {
      $pages = $this->updateOrderAfterChange((int)$oldOrder, (int)$newOrder);
      return $pages;
    }

    function updateOrderAfterChange($oldOrder, $newOrder) {
      // Moving from right to left
      if ($oldOrder > $newOrder) {
        $movedPage = \App\SurveyPage::where('active', 1)->where('order', $oldOrder)->first();
        $pages = \App\SurveyPage::where('active', 1)->where('order', '>=', $newOrder)->where('order', '!=', $oldOrder)->orderBy('order','ASC')->get();

        // shift
        for ($x = 0; $x < count($pages); $x++) {
          $pages[$x]->order = $x + $newOrder + 1;
          $pages[$x]->save();
        }
        $movedPage->order = $newOrder;
        $movedPage->save();
      } else if ($oldOrder < $newOrder) {
        $movedPage = \App\SurveyPage::where('active', 1)->where('order', $oldOrder)->first();
        $pages = \App\SurveyPage::where('active', 1)->where('order', '<=', $newOrder)->where('order', '!=', $oldOrder)->orderBy('order', 'ASC')->get();
        // shift
        for ($x = 0; $x < count($pages); $x++) {
          $pages[$x]->order = $x+1;
          $pages[$x]->save();
        }
        $movedPage->order = $newOrder;
        $movedPage->save();
      }
      return \App\SurveyPage::where('active', 1)->orderBy('order', 'ASC')->get();
    }

    /**
     * 
     * Update the order of the pages after deletion
     * 
     * @return void
     * 
     */
    function updateOrderAfterDelete() {
      $pages = \App\SurveyPage::where('active', 1)->orderBy('order','ASC')->get();
      for ($x = 0; $x < count($pages); $x++) {
        $pages[$x]->order = $x+1;
        $pages[$x]->save();
      }
    }

    /**
     * 
     * Get number of active pages 
     * 
     * @return int
     * 
     */
    function getNumberOfPages() {
      return \App\SurveyPage::where('active', 1)->count();
    }

    /**
     * 
     * Get all active pages
     * 
     * @return Illuminate\Database\Eloquent\Collection
     * 
     */
    function getAllPages() {
      return \App\SurveyPage::where('active', 1)->orderBy('order')->get();
    }
}
