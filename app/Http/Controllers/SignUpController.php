<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class SignUpController extends Controller
{
    function getSignUp() {
    	return view('signUp');
    }

    function postSignUp(Request $req) {
    	$user = new User();
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->password = Hash::make($req->password);
    	$user->birthday = $req->birthday;
    	$user->save();
    	return view('signUp', ['success' => true]);
    }
}
