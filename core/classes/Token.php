<?php

final class Token {

    /*__________________________________________
    /*	______ __             ________        
    /*	___  //_/_____ __________  __/____  __
    /*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
    /*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
    /*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
    /*								/____/   🔰 𝟣.𝟢 */

    /**
     * @return string
     */
    final public static function make() {
        $__payload = date('YmdGis');
        Session::set('___token', $__payload);
        $__token = JWT::encode($__payload, Config::PRIVATE_KEY);
        return '<input type="hidden" name="__token" value="'.$__token.'">';
    }

    final public static function verify($token) {

        if(Session::get('___token') == JWT::decode($token, Config::PRIVATE_KEY, 'HS256')){
            return true;
        }

        return false;
    }

    private function __construct() {}

}