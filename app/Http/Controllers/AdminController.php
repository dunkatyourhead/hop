<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $admins = User::where('level', 2)->where('status_aktif', 1)->paginate(10);
        return view('pages.admin.index', compact(
            'admins',
        ));
    }

    public function create(){
        return view('pages.admin.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $admin = User::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'status_verifikasi' => 2,
            'email_verified_at' => now(),
            'password' => bcrypt($request['password']),
            'level' => 2,
        ]);

        return redirect()->route('superadmin.admin.index')->with('success', 'Data has been created at '.$admin->created_at);
    }

    public function show($id){
        $admin = User::find($id);
        return view('pages.admin.show', compact(
            'admin',
        ));
    }
    
    public function edit($id){
        $admin = User::find($id);
        return view('pages.admin.edit', compact(
            'admin',
        ));
    }

    public function update(Request $request, $id){
        $admin = User::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin->id.",id",
        ]);

        $admin->update([
            'nama' => $request['nama'],
            'email' => $request['email'],
        ]);

        return redirect()->route('superadmin.admin.index')->with('success', 'Data has been updated at '.$admin->updated_at);
    }

    public function destroy($id){
        $admin = User::find($id);
        
        $admin->update([
            'status_aktif' => 2,
        ]);

        return redirect()->route('superadmin.admin.index')->with('success', 'Data has been deleted at '.$admin->updated_at);
    }
}
