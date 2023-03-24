<?php

final class Route {

	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

	/**
	 * @var string
	 */
	private $controller;

	/**
	 * @var string
	 */
	private $method;

	/**
	 * @var string
	 */
	private $pattern;

	/**
	 * @param string $controller
	 * @param string $method
	 * @param string $pattern
	 * @return void
	 */
	public function __construct($controller, $method, $pattern) {
		$this->controller = $controller;
		$this->method = $method;
		$this->pattern = $pattern;
	}

	/**
	 * @param string $request 
	 * @param null $args
	 * @return bool
	 */
	public function isMatched($request, &$args) {
		$result = preg_match($this->pattern, $request, $args);
		unset($args[0]);
		$args = array_values($args);
		return $result;
	}

	/**
	 * @return string
	 */
	public function getController() {
		return $this->controller;
	}

	/**
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * @return string
	 */
	public function getPattern() {
		return $this->pattern;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return sprintf('%s->%s()', $this->controller, $this->method);
	}

}
