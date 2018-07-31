<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;


class UserController extends Controller
{
    //

    public function checkAuth(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if (!Auth::attempt($credentials)) {
            return response(
                'Password Missmatch ',
                201
            );
        } else {
            return response(Auth::user(), 201);
        }
    }

    public function checkLogin()
    {
        return response(Auth::user());
    }


    public function create_account(Request $request)
    {
        $credentials = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if (!$credentials['name'] || !$credentials['email'] || !$credentials['password']) {
            return response('Fill in all the fields ', 201);
        }
        if ($credentials['password'] != $request->input('c_password')) {
            return response('Passwords do not Match ', 201);
        }
        if (!User::unique($credentials['email'])) {
            return response('Email aready exists ', 201);
        }
        return response(User::create($credentials) ? 'success' : 'error', 201);
    }



}
