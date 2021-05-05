<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/*
* --------------------------------------------------------------------
* Router Setup
* --------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/
$routes->get('/', 'Admin/AuthController::index', ['as' => 'index', 'filter' => 'login:admin']);
$routes->get('/admin/login', 'Admin/AuthController::index', ['as' => 'admin.login', 'filter' => 'login:admin']);
$routes->post('/admin/login', 'Admin/AuthController::auth', ['as' => 'admin.auth', 'filter' => 'login:admin']);
$routes->get('/admin/logout', 'Admin/AuthController::logout', ['as' => 'admin.logout']);



$routes->group('/admin', ['filter' => 'auth:admin', 'namespace' => 'App\Controllers\Admin'], function($routes) {

	/*
	* --------------------------------------------------------------------
	* Dashbor Modules
	* --------------------------------------------------------------------
	*/
	$routes->get('dashboard', 'DashboardController::index', ['as' => 'dashboard']);

	/*
	* --------------------------------------------------------------------
	* User Modules
	* --------------------------------------------------------------------
	*/
	$routes->get('user', 'UserController::index', ['as' => 'user.index']);
	$routes->post('user', 'UserController::store', ['as' => 'user.store']);
	$routes->put('user', 'UserController::update', ['as' => 'user.update']);
	$routes->get('user/(:num)/delete', 'UserController::delete/$1', ['as' => 'user.delete']);

});