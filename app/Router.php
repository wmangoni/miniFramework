<?php

namespace App;

class Router {

	/*
	* @ var routers
	*/

	protected $routers = array(
		'site' => 'site',
		'admin' => 'admin'
	);

	/*
	* @ var urlBase
	*/

	private $urlBase = APP_ROOT;

	/*
	* @ var routerOnRaiz
	*/

	protected $routerOnRaiz = 'site';

	/*
	* @ var onRaiz
	*/

	protected $onRaiz = TRUE;
}