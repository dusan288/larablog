<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $req)
    {
         $this->validate($req, [
             'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();

        Auth::login($user);

        return Redirect::intended('/blog');
        //return redirect('/login');
    }

    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $req)
    {
        $email = $req->email;
        $pass = $req->password;

        $this->validate($req, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        /*
        var_dump($email);
        var_dump($pass);
        die();
        */

        if(Auth::attempt(['email' => $email, 'password' => $pass]))
        {
           // echo "User logged in!";
           //dd(session()->get('intended'));
            return Redirect::intended('/blog');
        }
        else
        {
            $error = "Wrong username and/or password!";
            return redirect('/login')->withErrors(['msg' => $error]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/blog');
    }


}
