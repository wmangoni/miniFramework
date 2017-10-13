<?php

namespace App\Controllers;

use App\System;

class Controller extends System {

	public $dados;
	public $layout;

	private $path;
	private $pathRender;

	protected $title = null;
	protected $description = null;
	protected $keywords;
	protected $image;
	protected $captionController;
	protected $captionAction;
	protected $captionParams;

	public function __construct() {
		parent::__construct();
	}

	private function setPath($render) {
		if (is_array($render)) {
			foreach ($render as $li) {
				$path = 'views/' . $this->getArea() . '/' . $li . '.phtml';
				$this->fileExists($path);
				$this->path[] = $path;
			}
		} else {
			$this->pathRender = is_null($render) ? $this->getAction() : $render;
			$this->path = 'view/' . $this->getArea() . '/' . $li . $this->pathRender . '.phtml';
			$this->fileExists($this->path);
		}
	}

	private function fileExists($file) {
		if (!file_exists($file)) {
			die('Não foi localizado o arquivo ' . $file);
		}
	}
}