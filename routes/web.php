<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SurveyController@start');
Route::get('/start', 'SurveyController@start')->name('start');
Route::get('/abort', 'SurveyController@abort')->name('abort');
Route::get('/position', 'SurveyController@position')->name('position');
Route::get('/color', 'SurveyController@color')->name('color');
Route::get('/identityDebrief', 'SurveyController@identityDebrief')->name('identityDebrief');
Route::get('/intersectionDebrief', 'SurveyController@intersectionDebrief')->name('intersectionDebrief');
Route::get('/demographic', 'SurveyController@demographic')->name('demographic');
Route::get('/category', 'SurveyController@category')->name('category');
Route::get('/end', 'SurveyController@end')->name('end');
Route::post('/thanks', 'SurveyController@thanks')->name('thanks');
Route::post('/saveCircleData', 'SurveyController@saveCircleData')->name('saveCircleData');
Route::post('/saveIntersectData', 'SurveyController@saveIntersectData')->name('saveIntersectData');
Route::post('/deleteParticipant', 'SurveyController@deleteParticipant')->name('deleteParticipant');
Route::post('/saveMeaning', 'SurveyController@saveMeaning')->name('saveMeaning');
Route::post('/saveExplanation', 'SurveyController@saveExplanation')->name('saveExplanation');
Route::post('/saveSurveyQuestion', 'SurveyController@saveSurveyQuestion')->name('saveSurveyQuestion');
Route::post('/saveSurveyAnswer', 'SurveyController@saveSurveyAnswer')->name('saveSurveyAnswer');
Route::post('/saveCategory', 'SurveyController@saveCategory')->name('saveCategory');
Route::post('/saveDemographics', 'SurveyController@saveDemographics')->name('saveDemographics');

Auth::routes(['register' => false]);

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');
Route::get('/admin/content', 'AdminController@contentEditPage')->name('content')->middleware('auth');
Route::get('/admin/data', 'AdminController@dataProcessingPage')->name('data')->middleware('auth');
Route::get('/admin/page-manager', 'AdminController@pageManagerPage')->name('pagemanager')->middleware('auth');
Route::get('/admin/editcategory', 'AdminController@categoryEditPage')->name('editcategory')->middleware('auth');
Route::get('/admin/editsurveyquestions', 'AdminController@surveyquestionEditPage')->name('editsurveyquestionpage')->middleware('auth');
Route::get('/admin/getcategories', 'AdminController@getCategories')->name('getcategory')->middleware('auth');
Route::get('/admin/surveyquestions', 'AdminController@surveyQuestions')
  ->name('surveyquestions.all')
  ->middleware('auth');
Route::get('/admin/getData', 'AdminController@getData')->name('getData')->middleware('auth');
Route::post('/admin/updateSurveyQuestion/{id}', 'AdminController@updateSurveyQuestion')
  ->name('updateSurveyQuestion')
  ->middleware('auth');
Route::post('/admin/updateCategory/{id}', 'AdminController@updateCategory')
  ->name('updateCategory')
  ->middleware('auth');
Route::post('/admin/newSurveyQuestion', 'AdminController@newSurveyQuestion')
  ->name('newSurveyQuestion')
  ->middleware('auth');
Route::post('/admin/newCategory', 'AdminController@newCategory')
  ->name('newCategory')
  ->middleware('auth');
Route::delete('/admin/removeSurveyQuestion/{id}', 'AdminController@removeSurveyQuestion')
  ->name('removeSurveyQuestion')
  ->middleware('auth');
Route::delete('/admin/removeCategory/{id}', 'AdminController@removeCategory')
  ->name('removeCategory')
  ->middleware('auth');
Route::post('/admin/updateTextContent/{key}', 'AdminController@updateTextContent')->name('updateTextContent')->middleware('auth');

