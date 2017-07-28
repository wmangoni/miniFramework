<?php

$key = isset($_GET['key']) ? $_GET['key'] : 'Home/index';

$url_parse = explode('/', $key);

$controller = $url_parse[0].'Controller';

$method = isset($url_parse[1]) ? $url_parse[1] : 'index';

require_once('app/controllers/' . $controller . '.php');

use App\Controllers;

$controller = new $controller();
$controller->$method();