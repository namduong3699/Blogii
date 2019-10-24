<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
    	$user = User::where('email', $request->email)->first();
    	if(!empty($user)) {
    		$token = Str::random(50);
    		$passwordReset = new PasswordReset();
    		$passwordReset->user_email = $request->email;
    		$passwordReset->token = $token;
    		if($passwordReset->save()) {

    			Mail::send('modules/resetPasswordMail', array('name' => $user->name, 'token'=>$token), function($message) use($user){
    				$message->to($user->email, 'Blogii')->subject('Reset Password');
    			});
    		}
    	}
    	// $passwordReset = PasswordReset::updateOrCreate([
    	// 	'user_email' => $user->email,
    	// ], [
    	// 	'token' => Str::random(60),
    	// ]);
    	// if ($passwordReset) {
    	// 	$user->notify(new PasswordReset($passwordReset->token));
    	// }

    	return response()->json([
    		'message' => 'We have e-mailed your password reset link!'
    	]);
    }

    public function reset(Request $req)
    {
        $token = $req->token;
    	$passwordReset = PasswordReset::where('token', $token)->first();
    	if(!empty(($passwordReset))) {
    		if (Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
    			$passwordReset->delete();
    			return response()->json([
    				'message' => 'This password reset token is invalid.',
    			], 422);
    		} else {
    			$user = $passwordReset->user;
    			Auth::login($user);
    			return view('changePassword');
    		}
    	} else {
    		return response()->json([
    			'message' => 'This password reset token is not found.',
    		], 422);
    	}
    }

    function resetPasswordForm(Request $req) {
        $user = Auth::user();
        $user->password = Hash::make($req->newPassword);
        if($user->save()) {
            return redirect('/');
        } else {
            return 'false';
        }
    }
}