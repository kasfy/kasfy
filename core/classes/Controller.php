<?php

abstract class Controller {

	/**
	 * Controller மற்றும் view template இடையே தரவு பகிரப்பட்டது
	 * @var array
	 */
	private $data = [];

	/**
	 * ஒவ்வொரு கட்டுப்படுத்தியின் இயல்புநிலை முறை
	 * @return void
	 */
	abstract public function index();

	/**
	 * தரவுகளின் வரிசையில் புதிய மாறியைச் சேர்த்தல்
	 * @param string $key மாறியின் பெயர்
	 * @param mixed $value மாறியின் மதிப்பு
	 * @return void
	 */
	final protected function set($key, $value) {
		$this->data[$key] = $value;
	}

	/**
	 * தரவுகளின் வரிசையை வழங்குகிறது
	 * @return array
	 */
	final public function getData() {
		return $this->data;
	}

	/**
	 * குறியீட்டு முறைக்கு முன் செயல்படுத்தப்படும் ஒரு முறை
	 */
	public function __pre() {}

	/**
	 * குறியீட்டு முறைக்குப் பிறகு செயல்படுத்தப்படும் முறை
	 */
	public function __post() {}

}
