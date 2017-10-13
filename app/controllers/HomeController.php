<?php
namespace App\Controllers;

require_once 'Controller.php';

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