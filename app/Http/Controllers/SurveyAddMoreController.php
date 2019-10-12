<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyQuestions;
use App\question_types;

class SurveyAddMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMore()
    {
        $listing= question_types::get(['type_name']);
        $data['listing']=$listing;
        return view("questions.addMore",$data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMorePost(Request $request)
    {
        //print('hiiii')
        $request->validate([
            'addmore.*.q_type' => 'required',
            'addmore.*.ques' => 'required',
        ]);
         //print_r($request->addmore);
         //exit;
        foreach ($request->addmore as $key => $value) {
            SurveyQuestions::create($value);
        }
    
        return back()->with('success', 'Record Created Successfully.');
    }

    public function show($id)
    {
        $surveys = SurveyQuestions::where('survey_id','=',$id)->paginate(7);
       
        $data  = [];
        $data['questions'] = $surveys;
        $table=[];
        $questions=new SurveyQuestions;
        $data['name']=$questions->getTable();
        $data['all'] = $questions->getTableColumns();
        //print_r($data);
        //print($data['name']);
        //exit;
        return view("questions.show_ques",$data);



    }
    public function show_preview($id)
    {
        $surveys = SurveyQuestions::where('survey_id','=',$id)->get();
       
        $data  = [];
        $data['questions'] = $surveys;
        return view('questions.PushAll',$data);
    }


}
