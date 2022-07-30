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
$routes->get('/tentang_kami', 'Home::tentang_kami');
$routes->get('/destinasi', 'Destinasi::index');
$routes->get('/pangandaran’s_trivia', 'Home::pangandaran_trivia');
// $routes->get('/wuop', 'Home::wuop');
// $routes->get('/wuop/kuliner', 'Home::kuliner');
// $routes->get('/wuop/budaya', 'Home::budaya');
// $routes->get('/wuop/hidden_gems', 'Home::hidden_gems');
$routes->get('/ayo_berangkat', 'Home::berangkat');
$routes->get('/get_to_know', 'Home::get_to_know');
$routes->get('/events_berlangsung', 'Event::events_berlangsung');
$routes->get('/events_terlaksana', 'Home::events_terlaksana');
$routes->get('/join_here/(:any)', 'Quiz::join_here/$1');

$routes->post('/konten/update', 'Konten::update');

// Routes Admin
$routes->get('/admin', 'Admin\Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin\Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/destinasi', 'Admin\Destinasi::index', ['filter' => 'role:admin']);
$routes->get('/admin/destinasi/index', 'Admin\Destinasi::index', ['filter' => 'role:admin']);
$routes->get('/admin/events', 'Admin\Events::index', ['filter' => 'role:admin']);
$routes->get('/admin/events/index', 'Admin\Events::index', ['filter' => 'role:admin']);

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
