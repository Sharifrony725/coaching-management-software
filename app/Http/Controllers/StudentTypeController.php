<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\StudentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_types = DB::table('student_types')
        ->join('class_models','student_types.class_id', '=' , 'class_models.id')
        ->select('student_types.*','class_models.class_name')
        ->get();
        $classes = ClassModel::all();
        return view('student_type.index',compact('student_types','classes'));
    }
    public function studentTypeList()
    {
        $student_types = DB::table('student_types')
        ->join('class_models','student_types.class_id', '=' , 'class_models.id')
        ->select('student_types.*','class_models.class_name')
        ->get();
        $classes = ClassModel::all();
        return view('student_type.student_type_list',compact('student_types','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $data = new StudentType();
            $data->class_id = $request->class_id;
            $data->student_type = $request->student_type;
            $data->status = 1;
            $data->save();
        }
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
}
