<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginView');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/products/cards', 'ProductController::cards');
$routes->get('/dashboard', 'InfoController::index');
$routes->get('/infos/cards', 'InfoController::cards');
$routes->get('/info/add', 'InfoController::add');
$routes->get('/info/qr', 'InfoController::qr');
$routes->get('/info/qr/(:num)', 'InfoController::viewQr/$1');
$routes->get('/info/analytics', 'InfoController::analytics');
$routes->post('/info/create', 'InfoController::create');
$routes->get('/info/edit/(:num)', 'InfoController::edit/$1');
$routes->get('/infos/edit/(:num)', 'InfoController::edit/$1');
$routes->post('/info/update/(:num)', 'InfoController::update/$1');
$routes->post('/infos/update/(:num)', 'InfoController::update/$1');
$routes->get('/info/delete/(:num)', 'InfoController::delete/$1');
$routes->get('/infos/delete/(:num)', 'InfoController::delete/$1');
