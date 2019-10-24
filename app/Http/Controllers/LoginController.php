<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function getLogin() {
		return view('login');
	}

	public function postLogin(Request $request) {
		$rules = [
			'email' => 'required',
			'password' => 'required|min:6'
		];
		$messages = [
			'email.required'  => 'Email không được để trống',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự'
		];
		$validator = Validator::make($request->all(), $rules, $messages);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}
		else {
			$email = $request->input('email');
			$password = $request->input('password');
			if (Auth::attempt(['email' => $email, 'password' => $password])) {
				return redirect('/');
			} else {
				$errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
				return redirect()->back()->withInput()->withErrors($errors);
			}
		}
	}
}
