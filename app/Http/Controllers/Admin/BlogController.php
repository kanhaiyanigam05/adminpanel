<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Brian2694\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $blogs = Blog::all();
        $content = Content::all();
        return view('admin.blogs', compact('data', 'blogs', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Setting::first();
        $categories = Category::all();
        return view('admin.blogs', compact('data', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg,webp,gif|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);
        $blog = new Blog();
        $blog->name = trim($request->name);
        $blog->url = Str::slug(trim($request->name));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $blog->image = ImageHelper::uploadNewImage($request->file('image'), 'blog');
        }
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->save();
        Toastr::success('Blog created successfully', 'Success');
        return redirect()->route('admin.blogs.index');
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
        $categories = Category::all();
        $blog = Blog::find($id);
        return view('admin.blogs', compact('data', 'blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg,svg,webp,gif|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->name = trim($request->name);
        $blog->url = Str::slug(trim($request->name));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $blog->image = ImageHelper::uploadNewImage($request->file('image'), 'blog');
        }
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->save();
        Toastr::success('Blog updated successfully', 'Success');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        ImageHelper::deleteImage($blog->image, 'blog');
        $blog->delete();
        Toastr::success('Blog deleted successfully', 'Success');
        return redirect()->route('admin.blogs.index');
    }

    public function status(string $id)
    {
        $blog = Blog::find($id);
        $blog->status = !$blog->status;
        $blog->save();
        Toastr::success('Blog status updated successfully', 'Success');
        return redirect()->back();
    }
}
