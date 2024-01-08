<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        if ($user->role == 'STUDENT' || $user->role == 'VENDOR') {
            return view('manageProfile.participantProfile', compact('user'));
        }
        return view('manageProfile.staffProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        //Change Password if new password is filled
        if ($request->filled('newPassword')) {
            $request->validate([
                'newPassword' => 'min:8',
                'password_confirmation' => 'min:8|same:newPassword',
            ], [
                'password_confirmation.same' => 'The confirm password and password must match.',
            ]);
    
            $user->password = $request->input('newPassword');
        }
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->ic = $request->input('ic');
        $user->save();
    
        return back()->with('success', 'Profile updated successfully.');
    }

}
