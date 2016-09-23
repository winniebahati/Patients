<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Validator;
use Redirect;
use App\User;
use App\Wallet;
use Hash;
use Mail;
use URL;
use Auth;

class AccountController extends BaseController{

  	public function getCreate(){
 	return View ('account.create');
	}

	public function wallet(){
	//	if(Wallet::where('Auth_id', '=', Auth::user()->id)->exists()){
			$balance=Wallet::where('Auth_id', '=', Auth::user()->id)->first();
	//	}else{

	//	}
 	return View ('account.wallet')->with('balance', $balance);
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(),
			array(
			'fname'				=> 'required|max:50',
			'lname'				=> 'required|max:50',
			'email' 			=> 'required|max:50|email|unique:users',
			'username' 			=> 'required|max:20|min:3|unique:users',
			'password' 			=> 'required|min:6',
			'password_again' 	=> 'required|same:password'

			)
		);

		if($validator->fails()){
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
    }else{

    		$fname 		= Input::get('fname');
    		$lname 		= Input::get('lname');
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			//Activation code
			$code		= str_random(60);
			$user 	= User::create(array(
				'fname'		=> $fname,
				'lname'		=> $lname,
				'email'		=> $email,
				'username'	=> $username,
				'password'	=> Hash::make($password),
				'code'		=> $code,
				'active'	=>0
			));

			if($user){

				Mail::send('auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user){
					$message->to($user->email, $user->username)->subject('Activate your account');
				});

				flash()->success('Your account has been created! We have sent you an email to activate your account.');
				return Redirect::route('home');
			}
		}
	}

		public function getActivate($code){
		$user = User::where('code', '=', $code)->where('active','=', 0);

		if($user->count()) {
			$user = $user->first();

			//Update user to active state
			$user->active 	=1;
			$user->code 	='';

			if($user->save()) {
				flash()->info('Activated! You can now sign in!');
				return Redirect::route('home');					

			}

		}
		flash()->error('We could not activate your account. Try again later.');
		return Redirect::route('home');
		
	}

	  	public function getSignIn(){
		return View ('account.signin');
	}

	public function postSignIn(){
		$validator = Validator::make(Input::all(),
			array(
				'email'		=>'required|email',
				'password'	=>'required'
			)
		);

		if($validator->fails()){
			//Redirect to the sign in page
			return Redirect::route('account-sign-in')
					->withErrors($validator)
					->withInput();
		} else {

			$remember = (Input::has('remember')) ? true : false;

			//Attempt user sign in
			$auth = Auth::attempt(array(
				'email'		=> Input::get('email'),
				'password'	=> Input::get('password'),
				'active'	=> 1
				), $remember);

			if($auth) {

				//Redirect to the intended page
				return Redirect::intended('/');
			} else {
				flash()->error('Email/Password wrong,or account is not activated.');
				return Redirect::route('account-sign-in');
			
			}
		}
		flash()->error('There was a problem signing you in. Have you activated?');
		return Redirect::route('account-sign-in');
				
	}

	public function getForgotPassword() {
    
		return View ('account.forgot');
	}

	public function postForgotPassword() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email'
				)
			);

			if($validator->fails()) {
					return Redirect::route('account-forgot-password')
							->withErrors($validator)
							->withInput();
			} else {

				$user = User::where('email', '=', Input::get('email'));

				if ($user->count()) {
					$user = $user->first();

					//Generate a new code and password
					$code				= str_random(60);
					$password 			= str_random(10);

					$user->code 		= $code;
					$user->password_temp= Hash::make($password);

					if ($user->save()) {

						Mail::send('auth.forgot', array('link' => URL::route('account-recover', $code), 'username' => $user->username, 'password' => $password), function($message) use ($user) {
							$message->to($user->email, $user->username)->subject('Your new password');

						});
						flash()->info('We have sent you a new password by email.');
						return Redirect::route('home');
								
					}
				}

			}
			flash()->error('Could not request new password.');
			return Redirect::route('account-forgot-password');
					
	}
		public function getSignOut() {
		Auth::logout();
		flash()->info('Successfully Logged Out.');
		return Redirect::route('home');
	}

		public function getRecover($code) {
		$user = User::where('code', '=', $code)
				->where('password_temp', '!=', '');

		if ($user->count()) {
			$user = $user->first();

			$user->password 		= $user->password_temp;
			$user->password_temp 	= '';
			$user->code 			= '';

			if($user->save()) {
				flash()->info('Your account has been recovered and you can sign in with your new password.');
				return Redirect::route('home');
					
			}
		}
		flash()->error('Could not recover your account.');
		return Redirect::route('home');
			
	}

	  	public function getChangePassword() {
    
		return View ('account.password');

}

	public function postChangePassword() {
		$validator = Validator::make(Input::all(),
			array(
				'old_password'	=> 'required',
				'password'		=> 'required|min:6',
				'password_again'=> 'required|same:password'
			)
		);

		if($validator->fails()) {
			//redirect
			return Redirect::route('account-change-password')
					->withErrors($validator);
		} else {
			//change password
			$user 			= User::find(Auth::user()->id);

			$old_password 	= Input::get('old_password');
			$password 		= Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())){
				$user->password = Hash::make($password);

				if($user->save()) {
					flash()->info('Your password has been changed.');
					return Redirect::route('home');
							
				}

			}else{
				flash()->error('Your old password is incorrect.');
				return Redirect::route('account-change-password');
						
			}

		}
		flash()->error('Your password could not be changed.');
		return Redirect::route('account-change-password');
		
	}
}