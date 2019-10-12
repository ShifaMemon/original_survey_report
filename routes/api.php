<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("empDetail", ['uses' => 'Api\EmployeeDetail@empDetail']);
Route::post("EmpLogin", ['uses' => 'Api\EmployeeDetail@EmpLogin']);
Route::get("empId/{id}", ['uses' => 'Api\EmployeeDetail@empId']);
Route::get("surveyDetail/{id}", ['uses' => 'Api\SurveyController@surveyDetail']);
Route::get("survey_id/{id}", ['uses' => 'Api\SurveyController@survey_id']);
Route::post("save_answer/", ['uses' => 'Api\SurveyController@save_answer']);

