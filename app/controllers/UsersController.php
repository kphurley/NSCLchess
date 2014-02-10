<?php

class UsersController extends BaseController {

	public function __construct() {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	public function showLogin(){
		return View::make('users.login')
			->with('title','Coach login');
	}

	public function showRegistration(){
		return View::make('users.register')
			->with('title','NSCL Coach Registration');
	}

	public function createUser(){
		$validator = Validator::make(Input::all(), User::$rules);
 
	    if ($validator->passes()) {
	        // validation has passed, save user in DB
	        $user = new User;
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
	 
	    	return Redirect::to('users/login')->with('message', 'Thanks for registering!');
	    }

	    else {
	        // validation has failed, display error messages    
	        return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
	    }

	}

	public function signinUser(){
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
    		return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} 
		else {
    		return Redirect::to('users/login')
        		->with('message', 'Your username/password combination was incorrect')
        		->withInput();
        	}
	}

	public function getDashboard(){
		return View::make('users.dashboard')
				->with('title', 'NSCL Coach Dashboard');
	}

	public function logoutUser(){
		 Auth::logout();
    	return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
}