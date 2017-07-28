<?php

$key = isset($_GET['key']) ? $_GET['key'] : 'Home/index';
$url_parse = explode('/', $key);
$controller = $url_parse[0].'Controller';
$method = isset($url_parse[1]) ? $url_parse[1] : 'index';
$controller = new $controller();
$controller->$method();

class Controller {

	public $module;

	public function __construct() {}

	public function index() {

	}
}

class HomeController extends Controller{
	public function __construct() {
		$this->module = 'Home';
	}

	public function index() {
		echo $this->module . ' - index';
	}

	public function create() {
		echo $this->module . ' - create';
	}
}

class ProdutosController extends Controller{
	public function __construct() {
		$this->module = 'Produtos';
	}

	public function index() {
		echo $this->module . ' - index';
	}

	public function create() {
		echo $this->module . ' - create';
	}
}