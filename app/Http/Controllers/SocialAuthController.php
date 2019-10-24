<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\SocialAccount;

class SocialAuthController extends Controller
{
	public function redirect($social)
	{
		return Socialite::driver($social)->redirect();
	}
	public function callback($social)
	{
		$user = SocialAccountService::createOrGetUser(Socialite::driver($social)->stateless()->user(), $social);
		auth()->login($user);
		return redirect()->to('index');
	}
	//Facebook
	public function redirectFB()
	{
		return Socialite::driver('facebook')->redirect();   
	}   
	public function callbackFB()
	{
        // Sau khi xác thực Facebook chuyển hướng về đây cùng với một token
        // Các xử lý liên quan đến đăng nhập bằng mạng xã hội cũng đưa vào đây. 
		$user = Socialite::driver('facebook')->user();  
	}
	//Google
	public function redirectGG()
	{
		return Socialite::driver('google')->stateless()->redirect();   
	}   
	public function callbackGG()
	{ 
		$google = Socialite::driver('google')->stateless()->user();
		// $tempUser = User::where('email', $user->email)->first();
		$checkSocialAcc = SocialAccount::where('provider_user_id', $google->id)->count();
		// dd($google);
		$checkUser = User::where('email', $google->email)->count();
		
		if($checkSocialAcc) { //Nếu đã có checkSocialAcc
			Auth::login(SocialAccount::where('provider_user_id', $google->id)->first()->user);
			return redirect('/');
		} else if($checkUser){ // Chưa có checkSocialAcc, có user 
			$user = User::where('email', $google->email)->first();
			$socialAccount = new SocialAccount();
			$socialAccount->user_id = $user->id;
			$socialAccount->provider_user_id = $google->id;
			$socialAccount->provider = '1'; //google is 1
			$socialAccount->save();
			Auth::login($user);
			return redirect('/');  
		} else {
			$user = new User();
			$user->name = $google->name;
			$user->email = $google->email;
			$user->password = Hash::make($user->user['id']);
			// $user->birthday = ;
			$user->avatar = $google->avatar;
			$user->cover = '';
			$user->save();

			$socialAccount = new SocialAccount();
			$socialAccount->user_id = $user->id;
			$socialAccount->provider_user_id = $google->id;
			$socialAccount->provider = '1'; //google is 1
			$socialAccount->save();

			Auth::login($user);
			return redirect('/');  
		}
		return redirect('login');  
	}
}