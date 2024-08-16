<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Setting;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $teams = Team::all();
        return view('admin.teams', compact('data', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Setting::first();
        return view('admin.teams', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $team = new Team();
        $team->name = trim($request->input('name'));
        $team->profile = trim($request->input('profile'));

        if ($request->hasFile('image')) {
            $team->image = ImageHelper::uploadImage($request->file('image'), $team->image, 'team');
        }
        $team->save();
        Toastr::success('Team Added Successfully', 'Success');
        return redirect()->route('admin.teams.index');
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
        $team = Team::findOrFail($id);
        return view('admin.teams', compact('data', 'team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $team = Team::findOrFail($id);
        $team->name = trim($request->input('name'));
        $team->profile = trim($request->input('profile'));
        if ($request->hasFile('image')) {
            $team->image = ImageHelper::uploadImage($request->file('image'), $team->image, 'team');
        }
        $team->update();
        Toastr::success('Team Updated Successfully', 'Success');
        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        ImageHelper::deleteImage($team->image);
        $team->delete();
        Toastr::success('Team Deleted Successfully', 'Success');
        return redirect()->route('admin.teams.index');
    }
}
