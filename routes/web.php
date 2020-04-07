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
Route::get('/intersections', 'SurveyController@intersections')->name('intersections');
Route::get('/demographic', 'SurveyController@demographic')->name('demographic');
Route::get('/category', 'SurveyController@category')->name('category');
Route::get('/end', 'SurveyController@end')->name('end');
Route::post('/saveCircleData', 'SurveyController@saveCircleData')->name('saveCircleData');
