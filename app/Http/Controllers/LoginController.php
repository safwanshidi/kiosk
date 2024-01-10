<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\PaymentController;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $paymentController = new PaymentController();
		
		$credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->password === $credentials['password']) {
            // Passwords match
            $request->session()->regenerate();
            auth()->login($user);
            // dd(auth()->user());
            if ($user->role == 'STUDENT' || $user->role == 'VENDOR') {
                return redirect()->route('user.showUserProfile', ['id' => $user->id])->with('success', 'You\'re logged in');
            }else if($user->role == 'ADMIN'){
				//check whether is last or first day
				$paymentController->checkDateStatus();
                return redirect()->route('staff.showStaffProfile', ['id' => $user->id])->with('success', 'You\'re logged in');
            }else if($user->role == 'FK BURSARY'){
				//check whether is last or first day
				$paymentController->checkDateStatus();
				return redirect()->route('staff.showStaffProfile', ['id' => $user->id])->with('success', 'You\'re logged in');
			}else{
				return redirect()->route('staff.showStaffProfile', ['id' => $user->id])->with('success', 'You\'re logged in');
			}
                
        }

        // Passwords don't match or user not found
        return back()->withErrors([
            'ic' => 'The provided credentials do not match our records.',
        ]);
    }

    // To send the new randomly generated password
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Generate a random token for password reset
        $token = Str::random(64);

        // Insert the password reset record into the database
        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
       
        $user = User::where('email', $request->input('email'))->first();
        
        // Generate a new random password
        $newPassword = random_int(100000, 999999);

        // Set the random password as new password for the user
        $user->password = $newPassword;
        $user->save();

        // Send an email to the user with the new (random) password
        Mail::send('manageLogin.emailForgotPassword', ['newPassword' => $newPassword], function ($message) use ($request) {
            $message->to($request->input('email'));
            $message->subject('Reset Password'); //Email Title
        });

        // Redirect back with a success message
        return back()->with('reset', 'We have emailed you a reset password link');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/homePage');
    }
}
