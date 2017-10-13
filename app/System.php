<?php

namespace App;

class System extends Router{
	private $url;
	private $exploder;
	private $area;
	private $controller;
	private $action;
	private $params;

	public function __construct() {
		$this->setUrl();
		$this->setExploder();
		$this->setArea();
		$this->setController();
		$this->setAction();
		$this->setParams();
	}

	private function setUrl() {
		$this->url = isset($_GET['key']) ? $_GET['key'] : 'home/index';
	}

	private function setExploder() {
		$this->exploder = explode('/', $this->url);
	}

	public function getArea() {
		return $this->area;
	}

	private function setArea() {
		foreach ($this->routers as $i => $v) {
			if ($this->onRaiz && $this->exploder[0] == $i) {
				$this->area = $v;
				$this->onRaiz = FALSE;
			}
		}

		$this->area = empty($this->area) ? $this->routeOnRaiz : $this->area;

		if (!defined['APP_AREA']) {
			define('APP_AREA', $this->area);
		}
	}

	public function getController() {
		return $this->controller;
	}

	private function setController() {
		$this->controller = $this->onRaiz ? $this->exploder[0] : 
			(empty($this->exploder[1]) || is_null($this->exploder[1]) || !isset($this->exploder[1]) ? 'home' : $this->exploder[1]);
	}

	public function getAction() {
		return $this->action;
	}

	private function setAction() {
		$this->action = $this->onRaiz ?
			(!isset($this->exploder[1])) || is_null($this->exploder[1]) || empty($this->exploder[1]) ? 'index' : $this->exploder[1] :
			(!isset($this->exploder[2])) || is_null($this->exploder[2]) || empty($this->exploder[2]) ? 'index' : $this->exploder[2];
	}

	private function setParams() {
		if ($this->onRaiz) {
			unset($this->exploder[0], $this->exploder[1]);
		} else {
			unset($this->exploder[0], $this->exploder[1], $this->exploder[2]);
		}

		if (end($this->exploder) == null) {
			array_pop($this->exploder);
		}

		if (empty($this->exploder)) {
			$this->params = array();
		} else {
			foreach ($this->exploder as $val) {
				$params[] = $val;
			}

			$this->params = $params;
		}
	}

	private function getParams($indice) {
		return isset($this->params[$indice]) ? $this->params[$indice] : null;
	}

	private function validarController() {
		if (!class_exists($this->controller)) {
			die('O controller ' . $this->controller . ' não existe!');
		}
	}

	private function validarAction() {
		if (!method_exists($this->controller, $this->action)) {
			die('O método ' . $this->action . ' não existe!');
		}
	}

	public function Run() {
		$this->runController = 'controller\\' . $this->area . '\\' . $this->controller . 'Controller';

		$this->validarController();

		$this->runController = new $this->runController();

		$this->validarAction();

		$act = $this->action;

		$this->runController->$act();
	}
}