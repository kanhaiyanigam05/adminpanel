<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $categories = Category::all();
        return view('admin.blogs', compact('data', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $category = new Category();
        $category->name = trim($request->name);
        $category->description = $request->description;
        $category->save();
        Toastr::success('Category created successfully', 'Success');
        return redirect()->route('admin.categories.index');
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
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category deleted successfully', 'Success');
        return redirect()->route('admin.categories.index');
    }
    public function status(string $id)
    {
        $category = Category::find($id);
        $category->status = !$category->status;
        $category->save();
        Toastr::success('Status updated successfully', 'Success');
        return redirect()->back();
    }
}
