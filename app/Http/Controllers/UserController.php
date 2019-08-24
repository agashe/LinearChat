<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Resgiter new user
     * 
     * @param Request $request
     * @return Response
     */
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
    
        $new_user = new User;

        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = bcrypt($request->password);

        $new_user->save();

        return redirect()->route('index')->with('success', 'Thank you for registeration, please check your email to confirm the account!');
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

        return redirect()->route('chat');
    }
}
