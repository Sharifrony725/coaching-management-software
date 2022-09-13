<?php

namespace App\Http\Controllers;

use App\Models\HeaderFooterModel;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_footer_info = HeaderFooterModel::first();
        return view('homepage.manage_header_footer',compact('header_footer_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header_footer_info = HeaderFooterModel::first();
        if(isset($header_footer_info)){
            return view('homepage.manage_header_footer', compact('header_footer_info'));
        }else{
            return view('homepage.add_header_footer');
        }
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
            'title' => 'required|string|max:100',
            'sub_title' => 'required|string',
            'address' => 'required|string|max:255',
            'mobile' => ['required', 'string', 'min:11', 'max:15'],
            'copy_right' => 'required|string|max:50',
            'status' => 'required'
        ]);
        $header_footer = new HeaderFooterModel();
        $header_footer->title = $request->title;
        $header_footer->sub_title = $request->sub_title;
        $header_footer->address = $request->address;
        $header_footer->mobile = $request->mobile;
        $header_footer->copy_right = $request->copy_right;
        $header_footer->status = $request->status;
        $header_footer->save();
        return redirect()->route('add.header.footer')->with('message', 'Header footer info save successfully.');
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
        $header_footer = HeaderFooterModel::find($id);
        return view('homepage.edit_header_footer',compact('header_footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'sub_title' => 'required|string',
            'address' => 'required|string|max:255',
            'mobile' => ['required', 'string', 'min:11', 'max:15'],
            'copy_right' => 'required|string|max:50',
            'status' => 'required'
        ]);
        $header_footer = HeaderFooterModel::find($request->id);
        $header_footer->title = $request->title;
        $header_footer->sub_title = $request->sub_title;
        $header_footer->address = $request->address;
        $header_footer->mobile = $request->mobile;
        $header_footer->copy_right = $request->copy_right;
        $header_footer->status = $request->status;
        $header_footer->save();
        return redirect()->route('manage.header.footer')->with('message', 'Header & Footer info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $header_footer = HeaderFooterModel::find($id);
        $header_footer->delete();
        return redirect()->route('add.header.footer')->with('message', 'Header & Footer info delete successfully.');
    }
}
