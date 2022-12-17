<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.insert_form');
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin = $request->is_admin;
        $user->is_active = $request->is_active;

        $user->save();
        return redirect('/users');
    }

    public function show($id)
    {
        return 'show';
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.update_form',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->is_admin = $request->is_admin == 1 ? 1 : 0;
        $request->is_active = $request->is_active == 1 ? 1 : 0;

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->is_active = $request->is_active;

        $user->save();
        return redirect('/users');
    }
    public function destroy($id)
    {
        return 'destroy';
    }
}
