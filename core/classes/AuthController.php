<?php

abstract class AuthController extends Controller {

	/**
	 * இந்த முறை பயனர் உள்நுழைந்துள்ளதா என்பதைச் சரிபார்க்கிறது || This method checks if the user is logged in
	 * @return void
	 */
	final public function __pre() {
		if (empty(Session::get(Config::USER_COOKIE))) {
			Redirect::to('user/login');
		}
	}

}
