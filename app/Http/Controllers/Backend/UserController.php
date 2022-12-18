<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = '/users';
    }

    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.insert_form');
    }

    public function store(UserRequest $request, User $user)
    {
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();
        return redirect($this->returnUrl);
    }
    public function edit(User $user)
    {
        return view('backend.users.update_form',compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();
        return redirect($this->returnUrl);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect($this->returnUrl);

    }
    public function passwordForm(User $user)
    {
        return view('backend.users.password_form',compact('user'));
    }
    public function passwordPassword(UserRequest $request, User $user)
    {
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();
        return redirect($this->returnUrl);
    }
}
