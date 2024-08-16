<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Testimonial;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $testimonials = Testimonial::all();
        return view('admin.testimonials', compact('data', 'testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Setting::first();
        return view('admin.testimonials', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'rating' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
        ]);
        $testimonial = new Testimonial();
        $testimonial->name = trim($request->input('name'));
        $testimonial->rating = trim($request->input('rating'));
        $testimonial->designation = trim($request->input('designation'));
        $testimonial->description = trim($request->input('description'));

        if ($request->hasFile('image')) {
            $testimonial->image = ImageHelper::uploadImage($request->file('image'), $testimonial->image, 'testimonial');
        }
        $testimonial->save();
        Toastr::success('Testimonial Added Successfully', 'Success');
        return redirect()->route('admin.testimonials.index');
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
        $data = Setting::first();
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials', compact('data', 'testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'rating' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
        ]);
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = trim($request->input('name'));
        $testimonial->rating = trim($request->input('rating'));
        $testimonial->designation = trim($request->input('designation'));
        $testimonial->description = trim($request->input('description'));

        if ($request->hasFile('image')) {
            $testimonial->image = ImageHelper::uploadImage($request->file('image'), $testimonial->image, 'testimonial');
        }
        $testimonial->update();
        Toastr::success('Testimonial Updated Successfully', 'Success');
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        ImageHelper::deleteImage($testimonial->image);
        $testimonial->delete();
        Toastr::success('Testimonial Deleted Successfully', 'Success');
        return redirect()->route('admin.testimonials.index');
    }
}
