<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
    
        $new_user = new User;

        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = bcrypt($request->name);
        $new_user->image = 'avatar.jpg';
        $new_user->bio = '';

        $new_user->save();

        return redirect()->route('index');
    }
}
