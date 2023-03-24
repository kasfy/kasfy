<?php

abstract class ApiController extends Controller {

	/**
	 * இந்த முறை பயனர் உள்நுழைந்துள்ளதா என்பதைச் சரிபார்க்கிறது || This method checks if the user is logged in
	 * @return void
	 */
	final public function __pre() {
		// if (empty(Session::get(Config::USER_COOKIE))) {
		// 	http_response_code(403);
		// 	ob_clean();
		// 	die('HTTP: 403 forbidden.');
		// }
	}

	/**
	 * இந்த முறை API பதிலை அனுப்புகிறது || This method sends an API response
	 * @return void
	 */
	final public function __post() {
		ob_clean();
		Http::setJsonHeaders();
		echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
		die;
	}

}
