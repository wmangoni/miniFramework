<?php

namespace App\Controllers;

require_once 'Controller.php';

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