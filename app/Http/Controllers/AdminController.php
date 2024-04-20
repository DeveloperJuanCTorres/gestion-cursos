<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return $admin;
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
        try {
            $request->validate([
                'name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'email' => 'required|max:100|unique:admins',
            ]);

            $admin = new Admin();
            $admin->name = $request->name;
            $admin->last_name = $request->last_name;
            $admin->email = $request->email;
            $admin->password = $request->password;

            $admin->save();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $admin_request = Admin::findOrFail($admin->id);
        return $admin_request;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $admin_request = Admin::findOrFail($admin->id);
        try {
            $request->validate([
                'name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'email' => 'required|max:100|unique:admins',
            ]);
            
            $admin_request->name = $request->name;
            $admin_request->last_name = $request->last_name;
            $admin_request->email = $request->email;
            $admin_request->password = $request->password;

            $admin_request->save();

            return $admin_request;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin_request = Admin::destroy($admin->id);
        return $admin_request;
    }
}
