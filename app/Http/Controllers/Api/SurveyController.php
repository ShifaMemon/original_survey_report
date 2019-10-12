<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\survey;
use App\employees;
use App\Answer;
class SurveyController extends Controller
{
    public function surveyDetail($id)
    {

        $detail = employees ::with('company.surveys')->find($id);
        $response = [];
        $response['status'] = true;
        $response['data'] = $detail;
        return response()->json($response);
    }

    public function survey_id($id)
    {
        $survey = survey::with(['company', 'questions'])->find($id);
        $response = [];
        $response['status'] = true;
        $response['data'] = $survey;
        foreach($survey->questions as $question){
            $question->title = $question->ques;
            $question->option = explode(",", $question->subpart);
        }
        
        return response()->json($response);
    }

    public function save_answer(Request $request){

        $data = $request->all();
        $userId = $data['userId'];
        if(isset($data['question']) &&  is_array($data['question'])){
            foreach($data['question'] as $que){
                $ans = new Answer();
                $ans->employee_id =  $userId;
                $ans->survey_id = $que['survey_id'];
                $ans->ques_id = $que['id'];
                $ans->answer = isset($que['answer'])? is_array($que['answer']) ? implode(",", $que['answer']) : $que['answer'] : "";
                $ans->status = "";
                $ans->save();
            }
        }    
        $response['status'] = true;
        $response['data'] = "";
        return response()->json($response);
    }
}
