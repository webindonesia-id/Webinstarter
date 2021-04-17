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
$routes->get('/', function() {
	return view('admin/dashboard');
});

$routes->get('/signin', function() {
	return view('admin/auth/signin');
});

$routes->get('/signup', function() {
	return view('admin/auth/signup');
});



if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
