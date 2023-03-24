<?php

/*
|--------------------------------------------------------------------------
| இணைய வழிகள் | Web & Api Routes
|--------------------------------------------------------------------------
|
| Controller , function மற்றும் Parameters  களை இங்கே முறைப்படி இடவும்.
| இது சரியாக இணைய வழிப்படுத்தலுக்கு உதவும்.
|
*/

return [

	new Route('HomeController', 'index', '|^/?$|'),

	new Route('HomeApiController', 'index', '|^api/?$|'), 

	new Route('HomeController', 'e404', '|^.*$|'),
];



