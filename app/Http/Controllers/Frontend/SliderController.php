<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('frontend.modules.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Slider $slider)
    {
        $request->validate([
            'slide_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'slide_text' => ['required', 'string', 'max:255'],
            'slide_subtext' => ['required', 'string', 'max:255'],
            'slide_price' => ['required', 'integer'],
            'slide_link' => ['required', 'string', 'max:255'],
            'slide_ordem' => ['required', 'integer'],
            'slide_status' => ['required', 'integer'],
        ]);

        $slider = new Slider();

        if ($request->hasFile('slide_image')) {

            //verifica se existe a imagem e apaga

            if (File::exists(public_path($slider->slide_image))){
                File::delete(public_path($slider->slide_image));
            }

            $image = $request->slide_image;
            $imageName = rand() . '-slider-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/sliders/'), $imageName);

            $path = '/uploads/sliders/' . $imageName;
            $slider->slide_image = $path;
        }

        $slider->slide_text = $request->slide_text;
        $slider->slide_subtext = $request->slide_subtext;
        $slider->slide_price = $request->slide_price;
        $slider->slide_link = $request->slide_link;
        $slider->slide_ordem = $request->slide_ordem;
        $slider->slide_status = $request->slide_status;
        $slider->save();

        flash()->success('Slider Image Upload Successfully');
        return redirect()->route('slider.index', compact('slider'));

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
