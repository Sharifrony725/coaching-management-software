<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
            'slide_image' => 'required|image|mimes:jpeg,jpg,png',
            'slide_title' => 'required|string|max:50',
            'slide_description' => 'required|string|max:100',
            'status' => 'required'
        ]);
        $slider = new Slider();
        $slider->slide_title = $request->slide_title;
        $slider->slide_description = $request->slide_description;
        $slider->status = $request->status;
        $file = $request->file('slide_image');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/slider/';
        $imageUrl = $directory . $imageName;
        $file->move($directory, $imageUrl);
        $slider->slide_image = $imageUrl;
        $slider->save();
        return redirect()->route('slider.list')->with('message', 'Slider Added successfully.');
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
        $slider = Slider::find($id);
        return view('slider.edit', compact('slider'));
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
            'slide_image' => 'image|mimes:jpeg,jpg,png',
            'slide_title' => 'required|string|max:50',
            'slide_description' => 'required|string|max:100',
            'status' => 'required'
        ]);
        $slider = Slider::find($request->id);
        $slider->slide_title = $request->slide_title;
        $slider->slide_description = $request->slide_description;
        $slider->status = $request->status;
        $slider->status = $request->status;
        if ($request->hasFile('slide_image')) {
            $directory = public_path('' . $slider->slide_image);
            if (File::exists($directory)) {
                File::delete($directory);
            }
            $file = $request->file('slide_image');
            $imageName = $file->getClientOriginalName();
            $directory = 'admin/assets/slider/';
            $imageUrl = $directory . $imageName;
            $file->move($directory, $imageUrl);
            $slider->slide_image = $imageUrl;
        }
        $slider->save();
        return redirect()->route('slider.list')->with('message', 'Slider Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $directory = public_path('' . $slider->slide_image);
        if (File::exists($directory)) {
            File::delete($directory);
        }
        $slider->delete();
        return redirect()->route('slider.list')->with('message', 'Slider delete successfully.');
    }
    public function sliderPublished($id)
    {
        $sliderPublished = Slider::find($id);
        $sliderPublished->status = 1;
        $sliderPublished->save();
        return redirect()->route('slider.list')->with('message', 'Slider Published successfully.');
    }
    public function sliderUnpublished($id)
    {
        $sliderPublished = Slider::find($id);
        $sliderPublished->status = 2;
        $sliderPublished->save();
        return redirect()->route('slider.list')->with('message', 'Slider Unpublished successfully.');
    }
}
