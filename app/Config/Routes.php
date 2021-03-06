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
$routes->get('/count_notif', 'Home::count_notif');
$routes->get('/msg_notif', 'Home::msg_notif');


$routes->get('/login', 'Users::login');
$routes->get('/register', 'Register::index');


$routes->post('/login/p', 'Users::login_p');
$routes->get('/logout', 'Users::logout');


$routes->get('/jadwal', 'Jadwal::index');
$routes->get('/transaksi', 'Transaksi::index');
/* level 2 */ 
$routes->get('/transaksi_booking', 'Transaksi::trs_booking');
$routes->get('/transaksi_booking/(:any)', 'Transaksi::trs_booking/$1');

$routes->get('/transaksi_pembayaran', 'Transaksi::trs_pembayaran');
$routes->get('/transaksi_pembayaran/(:any)', 'Transaksi::trs_pembayaran/$1');

$routes->post('/transaksi_pembayaran/ajx_pembayaran', 'Transaksi::ajax_trs_pembayaran'); 
$routes->post('/transaksi_pembayaran/ajx_pembayaran_dua', 'Transaksi::ajax_trs_pembayaran_dua'); 

$routes->post('/transaksi_pembayaran/cancel_pembayaran_ajx', 'Transaksi::ajax_trs_clc_pembayaran'); 
$routes->post('/transaksi_pembayaran/ajx_approve_pembayaran', 'Transaksi::ajax_apv_pembayaran'); 
$routes->post('/transaksi_pembayaran/ajx_token_pembayaran', 'Transaksi::ajax_tkn_pembayaran'); 



/*  */

$routes->get('/register/add_ajax_kb/(:any)', 'Register::add_ajax_kab/$1');
$routes->get('/register/add_ajax_kc/(:any)', 'Register::add_ajax_kec/$1');
$routes->get('/register/add_ajax_de/(:any)', 'Register::add_ajax_desa/$1');

$routes->post('/register/d', 'Register::reg_add_prosess');

/* $routes->post('/transaksi/ajx', 'Transaksi::trsk_ajx_prosess'); */
$routes->post('/transaksi/check', 'Transaksi::trsk_check_prosess');
$routes->post('/transaksi/p', 'Transaksi::trsk_p_prosess');

$routes->post('/history', 'History::index'); 
$routes->post('/history/s', 'History::upload_prosess'); 
$routes->get('/history/viewall', 'History::view_all');
$routes->post('/history/viewall', 'History::view_all');
$routes->post('/history/viewall/cancel', 'History::view_all_cancel');

$routes->get('/jadwal/(:any)', 'Jadwal::view_jadwal/$1');

/* level 2 */


$routes->post('/jadwal/c', 'Jadwal::post_opsi_jadwal');  

$routes->post('/jadwal/cancelboking', 'Jadwal::progress_cencel_jadwal'); 
$routes->post('/jadwal/editboking', 'Jadwal::progress_edit_jadwal'); 
$routes->post('/jadwal/bedaharga', 'Jadwal::progress_bedaharga_jadwal'); 

$routes->get('/pelanggan', 'Pelanggan::index');

$routes->get('/pelanggan/add_ajax_kb/(:any)', 'Pelanggan::add_ajax_kab/$1');
$routes->get('/pelanggan/add_ajax_kc/(:any)', 'Pelanggan::add_ajax_kec/$1');
$routes->get('/pelanggan/add_ajax_de/(:any)', 'Pelanggan::add_ajax_desa/$1');

$routes->post('/pelanggan/add', 'Pelanggan::progres_add_pelanggan'); 
$routes->post('/pelanggan/d', 'Pelanggan::a_del_pelanggan'); 
$routes->post('/pelanggan/del', 'Pelanggan::progres_del_pelanggan'); 


$routes->get('/pelanggan/e', 'Pelanggan::a_edit_pelanggan'); 
$routes->post('/pelanggan/edit', 'Pelanggan::p_edit_pelanggan'); 



$routes->get('/laporan', 'Laporan::index');  
$routes->post('/laporan/cetak', 'Laporan::ctak');  


$routes->get('/pegawai', 'Pegawai::index');  

$routes->post('/pegawai/add', 'Pegawai::progres_add_pegawai'); 

$routes->post('/pegawai/d', 'Pegawai::a_del_pegawai'); 
$routes->post('/pegawai/del', 'Pegawai::progres_del_pegawai'); 

$routes->get('/pegawai/e', 'Pegawai::a_edit_pegawai'); 
$routes->post('/pegawai/edit', 'Pegawai::p_edit_pegawai'); 


$routes->get('/pegawai/add_ajax_kb/(:any)', 'Pegawai::add_ajax_kab/$1');
$routes->get('/pegawai/add_ajax_kc/(:any)', 'Pegawai::add_ajax_kec/$1');
$routes->get('/pegawai/add_ajax_de/(:any)', 'Pegawai::add_ajax_desa/$1');


/*  */


$routes->get('/profil', 'Profil::index'); 

$routes->get('/profil/v', 'Profil::a_edit_prfil');  
$routes->post('/profil/e', 'Profil::edit_profil_P'); 

$routes->get('/profil/add_ajax_kb/(:any)', 'Profil::add_ajax_kab/$1');
$routes->get('/profil/add_ajax_kc/(:any)', 'Profil::add_ajax_kec/$1');
$routes->get('/profil/add_ajax_de/(:any)', 'Profil::add_ajax_desa/$1');






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
