<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Universe\Server;

$server = new Server();

$documentroot = "index.php";

echo $server->serve($documentroot);

 