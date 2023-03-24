<?php

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	public function __construct() {
		
	}

	/**
	 * Show the application home to the user.
	 *
	 * @return Response
	 */
	public function index() {

		$this->set('title', 'Home');
		$user = UserModel::getById(Session::get(Config::USER_COOKIE));
		if ($user) {
			$this->set('user', $user->firstname. " " .$user->lastname);
		} else {
			$this->set('user', false);
		}
	}

	/**
	 * View: HTTP 404 Not Found
	 * @return void
	 */
	public function e404() {
		http_response_code(404);
		ob_clean();
		die('HTTP: 404 not found.');
	}

}



/*__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*                               /____/   🔰 𝟣.𝟢 */