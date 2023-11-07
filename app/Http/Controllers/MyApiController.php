<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\student;
use App\Models\User;
use App\Http\Resources\UserResource;

class MyApiController extends Controller
{
    
    public function list($id=null){
        if($id==null){
            return student::all();
        }else{
            return student::find($id);
        }
    }

    public function create(Request $request){
        $students = new student;
        $students->name = $request->name;
        $students->city = $request->city;
        $students->marks = $request->marks;
        $result = $students->save();
        if($result){
            return ["result"=>"operation successful"];
        }else{
            return ["result" => "operation failed"];
        }
    }

    public function update(Request $request,$id){
        $students = student::find($id);
        $students->name = $request->name;
        $students->city = $request->city;
        $students->marks = $request->marks;
        $result = $students->save();
        if($result){
            return ["result"=>"operation successful"];
        }else{
            return ["result" => "operation failed"];
        }
    }

    public function delete($id){
        $student = student::find($id);
        $result = $student->delete();
        if($result){
            return ["result"=>"operation successful"];
        }else{
            return ["result" => "operation failed"];
        }
    }

    public function api_resource_view(){
        $users = User::all();
        return UserResource::collection(($users));
    }
}
