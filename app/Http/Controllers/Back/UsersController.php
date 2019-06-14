<?php

namespace App\Http\Controllers\Back;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('back.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('back.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user->name = $request->name;
        $user->save();

        flash('User updated.', 'success');

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        flash('User removed.', 'success');

        return redirect()->route('users.index');
    }
}
