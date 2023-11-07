<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = student::all();
        return view('home',['students'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'marks'=>'required',
            ]
        );

        $name = $request->file('uploaded_file')->getClientOriginalName();
        //$name = time().'.'.$request->file('uploaded_file')->extension();
        $request->file('uploaded_file')->storeAs('files',$name);

        $student = new student;
        $student->name = $request->name;
        $student->city = $request->city;
        $student->marks = $request->marks;
        $student->files = $name;
        $student->save();
        return redirect(route('dashboard'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_form($id){
        $student = DB::table('students')->find($id);
        return view('edit_form',['student'=>$student]);
    }

    public function update(Request $request, $id){
        DB::table('students')->where('id',$id)->update([
            'name'=> $request->name,
            'city'=>$request->faculty,
            'marks'=>$request->grade,
        ]);
        return redirect(route('dashboard'))->with('status','one record updated!');
    }

    public function destroy($id){
        DB::table('students')->where('id',$id)->delete();
        return redirect(route('dashboard'))->with('status','one record deleted');
    }
    public function file_upload(Request $request){
        echo $request->file('file_upload')->store('files');
    }
}
