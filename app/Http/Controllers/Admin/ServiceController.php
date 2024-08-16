<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $content = Content::all();
        $services = Service::all();
        return view('admin.services', compact('data', 'content', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Setting::first();
        return view('admin.services', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'inner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string|max:255',
        ]);
        $service = new Service();

        $service->name = trim($request->input('name'));
        $service->url = Str::slug(trim($request->input('name')));
        $service->sub_heading = trim($request->input('sub_heading'));
        $service->short_description = trim($request->input('short_description'));
        $service->description = trim($request->input('description'));
        if ($request->hasFile('image')) {
            $service->image = ImageHelper::uploadNewImage($request->file('image'), 'service');
        }
        if ($request->hasFile('inner_image')) {
            $service->inner_image = ImageHelper::uploadNewImage($request->file('inner_image'), 'service');
        }
        if ($request->hasFile('banner_image')) {
            $service->banner_image = ImageHelper::uploadNewImage($request->file('banner_image'), 'service');
        }
        $service->meta_title = trim($request->input('meta_title'));
        $service->meta_description = trim($request->input('meta_description'));
        $service->meta_keywords = trim($request->input('meta_keywords'));
        $service->save();
        Toastr::success('Created successfully', 'Success');
        return redirect()->route('admin.services.index');
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
        $service = Service::findOrFail($id);
        return view('admin.services', compact('data', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'inner_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string|max:255',
        ]);
        $service = Service::findOrFail($id);

        $service->name = trim($request->input('name'));
        $service->url = Str::slug(trim($request->input('name')));
        $service->sub_heading = trim($request->input('sub_heading'));
        $service->short_description = trim($request->input('short_description'));
        $service->description = trim($request->input('description'));
        if ($request->hasFile('image')) {
            $service->image = ImageHelper::uploadImage($request->file('image'), $service->image, 'service');
        }
        if ($request->hasFile('inner_image')) {
            $service->inner_image = ImageHelper::uploadImage($request->file('inner_image'), $service->inner_image, 'service');
        }
        if ($request->hasFile('banner_image')) {
            $service->banner_image = ImageHelper::uploadImage($request->file('banner_image'), $service->banner_image, 'service');
        }
        $service->meta_title = trim($request->input('meta_title'));
        $service->meta_description = trim($request->input('meta_description'));
        $service->meta_keywords = trim($request->input('meta_keywords'));
        $service->save();
        Toastr::success('Updated successfully', 'Success');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        ImageHelper::deleteImage($service->image);
        $service->delete();
        Toastr::success('Deleted successfully', 'Success');
        return redirect()->back();
    }
}
