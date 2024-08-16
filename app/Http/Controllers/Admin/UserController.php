<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Setting;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $permissions = Permission::all();
        $users = User::all();
        return view('admin.users', compact('data', 'users', 'permissions'));
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
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,name',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();
        $user->name = trim($request->input('name'));
        $user->email = trim($request->input('email'));
        $user->password = Hash::make($request->input('password'));
        $user->save();
        if ($request->has('permissions')) {
            $user->permissions()->sync($request->input('permissions'));
        }

        Toastr::success('User created successfully', 'Success');
        return redirect()->back();
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
        $user = User::find($id);
        $user->permissions()->sync($request->input('permission'));
        Toastr::success('User permissions updated successfully', 'Success');
        return redirect()->back();
    }

    public function status(string $id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        Toastr::success('User status updated successfully', 'Success');
        return redirect()->back();
    }
}
