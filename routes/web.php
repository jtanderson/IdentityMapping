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
Route::post('/saveCircleData', 'SurveyController@saveCircleData')->name('saveCircleData');
Route::post('/saveIntersectData', 'SurveyController@saveIntersectData')->name('saveIntersectData');
Route::post('/deleteParticipant', 'SurveyController@deleteParticipant')->name('deleteParticipant');
Route::post('/saveMeaning', 'SurveyController@saveMeaning')->name('saveMeaning');
Route::post('/saveExplanation', 'SurveyController@saveExplanation')->name('saveExplanation');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
