<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        $data = Setting::first();
        $setting = Setting::first();
        $content = Content::all();
        return view('admin.setting', compact('data', 'setting', 'content'));
    }

    /**
     * Update the resource in storage.
     */
    private function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string',
            'primary' => 'nullable|string',
            'secondary' => 'nullable|string',
            'logo_dark' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp,gif|max:2048',
            'logo_light' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp,gif|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp,gif|max:2048',
            'phone1' => 'nullable|string',
            'phone2' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);
        $setting = Setting::first();
        if ($request->input('site_name')) {
            $setting->site_name = trim($request->input('site_name'));
        }
        if ($request->input('primary')) {
            $setting->primary = trim($request->input('primary'));
        }
        if ($request->input('secondary')) {
            $setting->secondary = trim($request->input('secondary'));
        }
        if ($request->input('phone1')) {
            $setting->phone1 = trim($request->input('phone1'));
        }
        if ($request->input('phone2')) {
            $setting->phone2 = trim($request->input('phone2'));
        }
        if ($request->input('email')) {
            $setting->email = trim($request->input('email'));
        }
        if ($request->input('address')) {
            $setting->address = trim($request->input('address'));
        }
        if ($request->input('youtube')) {
            $setting->youtube = trim($request->input('youtube'));
        }
        if ($request->input('facebook')) {
            $setting->facebook = trim($request->input('facebook'));
        }
        if ($request->input('instagram')) {
            $setting->instagram = trim($request->input('instagram'));
        }
        if ($request->input('linkedin')) {
            $setting->linkedin = trim($request->input('linkedin'));
        }
        if ($request->input('twitter')) {
            $setting->twitter = trim($request->input('twitter'));
        }
        if ($request->hasFile('logo_dark')) {
            $setting->logo_dark = ImageHelper::uploadImage($request->file('logo_dark'), $setting->logo_dark, 'setting');
        }
        if ($request->hasFile('logo_light')) {
            $setting->logo_light = ImageHelper::uploadImage($request->file('logo_light'), $setting->logo_light, 'setting');
        }
        if ($request->hasFile('favicon')) {
            $setting->favicon = ImageHelper::uploadImage($request->file('favicon'), $setting->favicon, 'setting');
        }
        if ($request->input('header_script')) {
            $setting->header_script = trim($request->input('header_script'));
        }
        if ($request->input('body_script')) {
            $setting->body_script = trim($request->input('body_script'));
        }
        if ($request->input('footer_script')) {
            $setting->footer_script = trim($request->input('footer_script'));
        }
        $setting->save();
        Toastr::success('Setting updated successfully', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
