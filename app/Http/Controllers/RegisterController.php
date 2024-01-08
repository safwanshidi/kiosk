<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerParticipant(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'ic' => 'required|digits_between:12,12|unique:users',
                'phone' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|min:8|same:password',
            ],
            [
                'ic.required' => 'The IC field is required.',
                'ic.digits_between' => 'The IC must be exactly 12 digits.',
                'ic.unique' => 'The IC No. has been registered.',
                'password_confirmation.required' => 'The repeat password field is required.',
                'password_confirmation.min' => 'The confirm password must be at least 8 characters.',
                'password_confirmation.same' => 'The confirm password and password must match.',
            ]
        );



        // Example: Create a new user
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('fail', 'Registration is failed. Ensure your info are correct');
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->ic = $request->input('ic');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('participant.registerMessage');
    }

    public function registerStaff(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required',
            ],
            [
                'email.unique' => 'The email has been registered.',
            ]
        );

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->ic = mt_rand(100000000000, 999999999999); //Temporary IC number
        $user->password = random_int(100000, 999999);; //Temporary password
        $user->role = $request->input('role');
        $user->save();

        Mail::send('manageRegister.emailStaff', ['password' => $user->password, 'ic' => $user->ic], function ($message) use ($request) {
            $message->to($request->input('email'));
            $message->subject('Staff Kiosk Account Created'); //Email Title
        });

        return redirect()->route('staff.linkSent');
    }
}
