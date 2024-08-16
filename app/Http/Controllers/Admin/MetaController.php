<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meta;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        return view('admin.meta', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->checkMeta == true) {
            $page = $request->input('page');
            $seo = Meta::where('page', $page)->first();
            echo json_encode($seo);
        } else {
            $seo = Meta::where('page', $request->input('page_name'))->first();
            $seo->meta_title = $request->input('meta_title');
            $seo->meta_description = $request->input('meta_description');
            $seo->meta_keywords = $request->input('meta_keywords');
            $seo->update();

            Toastr::success('SEO Meta updated successfully', 'Success');

            return redirect()->back();
        }
    }
}
