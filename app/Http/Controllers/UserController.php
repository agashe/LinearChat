<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewPassword;
use App\Mail\SendConfirmation;
use App\User;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);
        
        if ($request->name == $request->password || $request->email == $request->password 
            || substr($request->email, 0, strpos($request->email, '@')) == $request->password) {
            $validator = Validator::make([], []);
            $validator->getMessageBag()->add('password', 'Your name/email can\'t be your password');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $newUser = new User;

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        
        // Create confirmation code.
        $newUser->confirmation_code = str_replace('/', '0', bcrypt(mt_rand(0, 100000)));
        $newUser->save();

        // Send confirmation mail.
        Mail::to($newUser->email)->send(new SendConfirmation($newUser->id, $newUser->confirmation_code));

        return redirect()->route('index')->with('success', 'Thank you for registeration, please check your email to confirm the account!');
    }

    public function confirmUser($id, $code)
    {
        $user = User::find(intval($id));

        if (!$user->isConfirmed() && $user->confirmation_code == $code) {
                $user->confirmed = 1;
                $user->save();

                return redirect()->route('login')->with('success', 'Your account has been confirmed!, please login');
        } 

        return redirect()->route('index');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check that the user's account is confirmed.
            if (Auth::user()->isConfirmed()) {
                return redirect()->route('chat');
            } else {
                // Send a new confirmation code.
                Auth::user()->confirmation_code = str_replace('/', '0', bcrypt(mt_rand(0, 100000)));
                Auth::user()->save();
                Mail::to(Auth::user()->email)->send(new SendConfirmation(Auth::user()->id, Auth::user()->confirmation_code));
                
                // logout the user until he account be confirmed.
                Auth::logout();

                return redirect()->route('index')->with('success', 'Your account is not confirmed , we have sent a new code please check your mail !');
            }
        } else {
            $validator = Validator::make([], []);
            $validator->getMessageBag()->add('email', 'Invalid Email or Password');
            return redirect()->back()->withErrors($validator);
        }
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        
        // Check that the email is exsit in the DB.
        $user = User::where('email', '=', $request->email)->first();
        if (!$user) {
            return redirect()->route('index')->with('success', $user);
        }

        // Create new password and save it into the DB.
        $newPassword = mt_rand(0, 1000000);
        $user->password = bcrypt($newPassword);
        $user->save();

        // Sned the new password.
        Mail::to($request->email)->send(new SendNewPassword($newPassword));
        
        return redirect()->route('index')->with('success', 'Your Password has been reset , please check your mail !');
    }

    public function logout()
    {
        $userName = Auth::user()->name;
        Auth::logout();
        return redirect()->route('index')->with('success', "Good Bye $userName");
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);
        
        if ($request->name == $request->password || $request->email == $request->password 
            || substr($request->email, 0, strpos($request->email, '@')) == $request->password) {
            $validator = Validator::make([], []);
            $validator->getMessageBag()->add('password', 'Your name/email can\'t be your password');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $newUser = new User;

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        
        // Create confirmation code.
        $newUser->confirmation_code = str_replace('/', '0', bcrypt(mt_rand(0, 100000)));
        $newUser->save();

        // Send confirmation mail.
        Mail::to($newUser->email)->send(new SendConfirmation($newUser->id, $newUser->confirmation_code));

        return redirect()->route('index')->with('success', 'Thank you for registeration, please check your email to confirm the account!');
    }
}
