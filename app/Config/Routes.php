<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Users::login');
$routes->get('/register', 'Register::index');


$routes->post('/login/p', 'Users::login_p');
$routes->get('/logout', 'Users::logout');


$routes->get('/jadwal', 'Jadwal::index');
$routes->get('/transaksi', 'Transaksi::index');

$routes->get('/register/add_ajax_kb/(:any)', 'Register::add_ajax_kab/$1');
$routes->get('/register/add_ajax_kc/(:any)', 'Register::add_ajax_kec/$1');
$routes->get('/register/add_ajax_de/(:any)', 'Register::add_ajax_desa/$1');

$routes->post('/register/d', 'Register::reg_add_prosess');

/* $routes->post('/transaksi/ajx', 'Transaksi::trsk_ajx_prosess'); */
$routes->post('/transaksi/check', 'Transaksi::trsk_check_prosess');
$routes->post('/transaksi/p', 'Transaksi::trsk_p_prosess');

$routes->post('/history/s', 'History::upload_prosess'); 
$routes->get('/history/viewall', 'History::view_all');
$routes->post('/history/viewall', 'History::view_all');
$routes->post('/history/viewall/cancel', 'History::view_all_cancel');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
