<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('listHP', 'Handphone::index');
$routes->get('listHP/getHintName', 'Handphone::getHintName');
$routes->get('listHP/getHintNameAdmin', 'Handphone::getHintNameAdmin');
$routes->get('addHP', 'Handphone::create');
$routes->match(['get', 'post'],'postHP', 'Handphone::postHP');
$routes->get('showHP', 'Handphone::show');
$routes->get('updateHP', 'Handphone::update');
$routes->get('deleteHP', 'Handphone::delete');
$routes->get('compare', 'Handphone::compare');
$routes->get('about', 'Home::about');
$routes->get('editProfile', 'Home::editProfile');
$routes->get('dashboardAdmin', 'Home::dashboardAdmin');
$routes->post('register', 'Register::index');
$routes->get('login', 'Login::index');
$routes->get('logout', 'Logout::index');
$routes->match(['get', 'post'], 'login/postLogin', 'Login::postLogin');
$routes->match(['get', 'post'], 'register/postReg', 'Register::postReg');
$routes->match(['get', 'post'], 'postUpdateHP', 'Handphone::postUpdateHP');
$routes->match(['get', 'post'], 'updateUser', 'Register::updateUser');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
