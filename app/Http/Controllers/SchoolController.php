<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return view('school.index',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create');
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
        'school_name' => 'required|string|max:255',
        'status' => 'required'
       ]);
       $school = new School();
       $school->school_name = $request->school_name;
       $school->status = $request->status;
       $school->save();
       return redirect()->route('schools.index')->with('message', 'School Added successfully.');
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
        $school = School::find($id);
        return view('school.edit',compact('school'));

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
        $school = School::find($id);
        $request->validate([
            'school_name' => 'required|string|max:255'
        ]);
        $school->school_name = $request->school_name;
        $school->save();
        return redirect()->route('schools.index')->with('message', 'School Name Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::find($id);
        $school->delete();
        return redirect()->route('schools.index')->with('message', 'School delete successfully.');
    }
    public function schoolUnpublished($id){
        $schoolUnpublished = School::find($id);
        $schoolUnpublished->status = 2;
        $schoolUnpublished->save();
        return redirect()->route('schools.index')->with('message', 'School Unpublished successfully.');
    }
    public function schoolPublished($id){
        $schoolPublished = School::find($id);
        $schoolPublished->status = 1;
        $schoolPublished->save();
        return redirect()->route('schools.index')->with('message', 'School Published successfully.');
    }
}
