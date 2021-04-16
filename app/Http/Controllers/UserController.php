<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {   
        return view('users.index')->with(['users' => User::all()]);
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        
        session()->flash('success', 'User changed to admin.');

        return redirect(route('users.index'));
    }

    public function edit()
    {
        return view('users.profile')->with(['users' => auth()->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::find(auth()->id());

        $user->name = $request->name;
        $user->about = $request->about;

        $user->save();

        session()->flash('success', 'User profile has been updated.');

        return redirect(route('users.index'));
    }
}
