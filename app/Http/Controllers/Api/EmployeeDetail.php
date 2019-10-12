<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\employees;
use App\survey;

class EmployeeDetail extends Controller
{
   
    public function EmpLogin(Request $request)
    {
            $response = [];
            $data =$request->all();
            $useremail = $data['email'];
            $user = employees::where('email',$useremail)->get()->first();
           
            if($user)
            {
                $has = app('hash');
                if($has->check($data['password'],$user->password))
                {
                    $response['status'] = true;
                    $response['data']=$user;
                    $response['message']="Welcomee!!!!";
                   
                }
                else
                {
                    $response['status'] = false;
                    $response['message']="Username or password not match";
                }
                return response()->json($response);
            } 
            else
            {


                $response['status'] = false;
                $response['message'] = "Email Not exist";
                
                
            }
            return response()->json($response);
            
        
    }
    public function empDetail()
    {

        $detail = employees ::with('department.company')->get();
        $response = [];
        $response['status'] = true;
        $response['data'] = $detail;
        return response()->json($response);
    }
    public function empId($id)
    {
        $empid = employees::with('department.company')->find($id);
        $response = [];
        $response['status'] = true;
        $response['data'] = $empid;
        return response()->json($response);
    }



   
}
