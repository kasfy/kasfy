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


/*__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*                               /____/   🔰 𝟣.𝟢 */