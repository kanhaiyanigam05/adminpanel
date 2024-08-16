<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meta;
use App\Models\Other;
use App\Models\Content;
use App\Models\Setting;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Brian2694\Toastr\Facades\Toastr;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Setting::first();
        return view('admin.dashboard', compact('data'));
    }
    public function home()
    {
        $data = Setting::first();
        $content = Content::all();
        return view('admin.home', compact('data', 'content'));
    }
    public function about()
    {
        $data = Setting::first();
        $content = Content::all();
        return view('admin.about', compact('data', 'content'));
    }
    public function podcast()
    {
        $data = Setting::first();
        $content = Content::all();
        return view('admin.podcast', compact('data', 'content'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'second_image' => 'mimes:mp4,m4v,mkv,webm|max:20000',
        ]);
        $content = Content::findOrFail($id);
        if ($request->input('number')) {
            $content->number = trim($request->input('number'));
        }
        $content->heading = trim($request->input('heading'));
        $content->sub_heading = trim($request->input('sub_heading'));
        $content->description = trim($request->input('description'));
        if ($request->hasFile('image')) {
            $path = ImageHelper::uploadImage($request->file('image'), $content->image, 'images');
            $content->image = $path;
        }
        if ($request->hasFile('second_image')) {
            $path = ImageHelper::uploadImage($request->file('second_image'), $content->second_image, 'images');
            $content->second_image = $path;
        }
        $content->button_text = trim($request->input('button_text'));
        $content->button_link = trim($request->input('button_link'));
        if ($request->hasFile('extra1')) {
            $content->extra1 = ImageHelper::uploadImage($request->file('extra1'), $content->extra1, 'images');
        } else {
            $content->extra1 = trim($request->input('extra1'));
        }
        if ($request->hasFile('extra2')) {
            $content->extra2 = ImageHelper::uploadImage($request->file('extra2'), $content->extra2, 'images');
        } else {
            $content->extra2 = trim($request->input('extra2'));
        }
        if ($request->hasFile('extra3')) {
            $content->extra3 = ImageHelper::uploadImage($request->file('extra3'), $content->extra3, 'images');
        } else {
            $content->extra3 = trim($request->input('extra3'));
        }
        if ($request->hasFile('extra4')) {
            $content->extra4 = ImageHelper::uploadImage($request->file('extra4'), $content->extra4, 'images');
        } else {
            $content->extra4 = trim($request->input('extra4'));
        }
        if ($request->hasFile('extra5')) {
            $content->extra5 = ImageHelper::uploadImage($request->file('extra5'), $content->extra5, 'images');
        } else {
            $content->extra5 = trim($request->input('extra5'));
        }
        $content->update();
        Toastr::success('Content updated successfully', 'Success');

        return redirect()->back();
    }
    public function otherStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp,gif|max:2048',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
        ]);

        $other = Other::findOrNew($request->input('id'));
        if ($request->input('content_id')) {
            $other->content_id = trim($request->input('content_id'));
        }
        $other->heading = trim($request->input('heading'));
        $other->description = trim($request->input('description'));
        if ($request->hasFile('image')) {
            $other->image = ImageHelper::uploadImage($request->file('image'), $other->image, 'images');
        }
        $other->button_text = trim($request->input('button_text'));
        $other->button_link = trim($request->input('button_link'));
        $other->save();
        Toastr::success('Created successfully', 'Success');

        return response()->json(['success' => true, 'message' => 'Created successfully']);
    }

    public function otherEdit($id)
    {
        $others = Other::find($id);
        return response()->json($others);
    }
    public function otherDestroy($id)
    {
        $others = Other::find($id);
        ImageHelper::deleteImage($others->image);
        $others->delete();
        Toastr::success('Deleted successfully', 'Success');
        return redirect()->back();
    }

    public function enquiries()
    {
        $data = Setting::first();
        $enquiries = Enquiry::all();
        $content = Content::all();
        return view('admin.enquiries', compact('data', 'enquiries', 'content'));
    }
}
