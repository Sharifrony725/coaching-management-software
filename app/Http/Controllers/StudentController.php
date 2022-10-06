<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\School;
use App\Models\ClassModel;
use App\Models\StudentType;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $schools = School::where('status' , '=', 1)->get();
       $classes = ClassModel::where('status' , '=', 1)->get();
       return view('student.create',compact('schools', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function bringStudentType(Request $request){
        $types = StudentType::where('class_id', $request->class_id)->get();
        $classes = ClassModel::where('status', '=' , 1)->get();
        return view('student.student_types',[
                'types' => $types,
                'classes' => $classes,
                'data' => $request
            ]);
    }
    public function batchRollForm(Request $request){
        $type = StudentType::find($request->type_id);
        $batches = Batch::where([
            'class_id' => $request->class_id,
            'student_type_id'=> $request->type_id,
           ])->get();
        return view('student.batchRollForm',compact('batches','type'));
    }
//last
}
