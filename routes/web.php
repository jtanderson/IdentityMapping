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
Route::get('/position', 'SurveyController@position')->name('position');
Route::get('/color', 'SurveyController@color')->name('color');
Route::get('/survey', 'SurveyController@survey')->name('survey');
Route::get('/demographic', 'SurveyController@demographic')->name('demographic');
Route::get('/end', 'SurveyController@end')->name('end');
Route::get('/intersections', 'SurveyController@intersections')->name('intersections');
// Route::get('/survey', 'SurveyController@survey')->name('survey');
// Route::get('/demographics', 'SurveyController@demographics')->name('demographics');
// Route::get('/grouping', 'SurveyController@grouping')->name('grouping');
// Route::get('/finished', 'SurveyController@finished')->name('finished');
