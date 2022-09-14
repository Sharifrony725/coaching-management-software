<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassModel::all();
        return view('class_name.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class_name.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string',
            'status' => 'required'
        ]);
        $class = new ClassModel();
        $class->class_name = $request->class_name;
        $class->status = $request->status;
        $class->save();
        return redirect()->route('classes.index')->with('message', 'class added successfully.');
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
        $class = ClassModel::find($id);
        return view('class_name.edit',compact('class'));
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
        $class = ClassModel::find($id);
        $request->validate([
            'class_name' => 'required'
        ]);
        $class->class_name = $request->class_name;
        $class->save();
        return redirect()->route('classes.index')->with('<message></message>','class name updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = ClassModel::find($id);
        $class->delete();
        return redirect()->route('classes.index')->with('message', 'class name delete successfully.');
    }

    public function classPublished($id)
    {
        $classPublished = ClassModel::find($id);
        $classPublished->status = 1;
        $classPublished->save();
        return redirect()->route('classes.index')->with('message', 'class published successfully.');
    }
    public function classUnpublished ($id){
        $classUnpublished = ClassModel::find($id);
        $classUnpublished->status = 2;
        $classUnpublished->save();
        return redirect()->route('classes.index')->with('message', 'class unpublished successfully.');
    }

}
