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
        $newUser->confirmation_code = bcrypt(mt_rand(0, 100000));
        
        $newUser->save();

        // Send confirmation mail.
        Mail::to($newUser->email)->send(new SendConfirmation($newUser->id, $newUser->confirmation_code));

        return redirect()->route('index')->with('success', 'Thank you for registeration, please check your email to confirm the account!');
    }

    public function confirmUser($id, $code)
    {
        $user = User::find($id);

        if (!$user->isConfirmed()) {
            if (Auth::user()) {
                if (Auth::user()->id == $user->id && $user->confirmation_code == $code) {
                    $user->confirmed = 1;
                    $user->save();

                    return redirect()->route('chat')->with('success', 'Your account has been confirmed');
                } 
            } else {
                if ($user->confirmation_code == $code) {
                    $user->confirmed = 1;
                    $user->save();

                    return redirect()->route('index')->with('success', 'Your account has been confirmed');
                }
            }
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
            return redirect()->route('chat');
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
        
        // ToDo: chaeck that the email is exsit in the DB.

        // ToDo: create new password and save it into the DB.
        $newPassword = bcrypt("test");

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
}
