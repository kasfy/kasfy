<?php

class HomeApiController extends ApiController {

	/**
	 * Param: /api/tasks
	 * cURL example:
	 * <code>
	 * 	curl http://localhost/minimal/api/cookie
	 * </code>
	 * @return void
	 */
	public function index() {
		
		Http::checkMethodIsAllowed('GET');

		$array = array(
			"status" => "success",
			"message" => "Welcome to the PHP MVC Api"
		);

		$this->set('response', $array);
	}

}
