<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        $classes = ClassModel::all();
        return view('batch.index',compact('batches' , 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = ClassModel::all();
        return view('batch.create',compact('classes'));
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
            'class_id' => 'required',
            'batch_name' => 'required|string|max:2566|unique:batches,batch_name',
            'student_capacity' => 'required|integer',
            'status' => 'required'
        ]);
        $batch = new Batch();
        $batch->class_id = $request->class_id;
        $batch->batch_name = $request->batch_name;
        $batch->student_capacity = $request->student_capacity;
        $batch->status = $request->status;
        $batch->save();
        return redirect()->route('batches.create')->with('message', 'Batch added successfully');
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
        $batch = Batch::find($id);
        $classes = ClassModel::all();
        return view('batch.edit',compact('batch','classes'));
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
        $batch = Batch::find($id);
        $request->validate([
            'class_id' => 'required',
            'batch_name' => 'required|string|max:2566|',
            'student_capacity' => 'required|integer',
        ]);
        $batch->class_id = $request->class_id;
        $batch->batch_name = $request->batch_name;
        $batch->student_capacity = $request->student_capacity;
        $batch->save();
        return redirect()->route('batches.index')->with('message', 'Batch Info Update successfully');
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
    public function batchListByAjax(Request $request)
    {
      $batches = Batch::where('class_id', $request->id)->get();
      if(count($batches) > 0){
          return view('batch.batchListByAjax',compact('batches'));
      }else{
          return view('batch.batchEmptyMessage');
      }
    }
    public function batchPublished(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->status = 1;
        $batch->save();
        $batches = Batch::where('class_id', $request->class_id)->get();
        return view('batch.batchListByAjax', compact('batches'))->with('message','Batch published successfully.');
    }
    public function batchUnpublished(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->status = 2;
        $batch->save();
        $batches = Batch::where('class_id', $request->class_id)->get();
        return view('batch.batchListByAjax', compact('batches'))->with('message','Batch unpublished successfully.');
    }
    public function batchDelete(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->delete();
        $batches = Batch::where('class_id', $request->class_id)->get();
        if(count($batches) > 0){
            return view('batch.batchListByAjax', compact('batches'))->with('message','Batch unpublished successfully.');
        }else{
            return view('batch.batchEmptyMessage');
        }
    }

}
