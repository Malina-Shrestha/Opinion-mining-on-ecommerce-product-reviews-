<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = auth('admin')->user();

        return view('back.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = auth('admin')->user();
        $user->name = $request->name;
        $user->save();

        flash('Profile updated.', 'success');

        return redirect()->route('admin.profile.edit');
    }

    public function changePassword()
    {
        return view('back.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = auth('admin')->user();

        if(!password_verify($request->old_password, $user->password)) {
            flash('Incorrect old password.', 'danger');

            return redirect()->back();
        }

        $user->password = bcrypt($request->password);
        $user->save();

        flash('Password changed.', 'success');

        return redirect()->route('admin.password.edit');
    }
}
