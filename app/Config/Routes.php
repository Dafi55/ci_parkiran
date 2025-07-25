<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/main', 'Home::main');
$routes->get('/juruparkir', 'Juruparkir::index');
$routes->get('/juruparkir/create', 'Juruparkir::create');
$routes->post('/juruparkir/store', 'Juruparkir::store');
$routes->get('/juruparkir/edit/(:num)', 'Juruparkir::edit/$1');
$routes->post('/juruparkir/update/(:num)', 'Juruparkir::update/$1');
$routes->get('/juruparkir/delete/(:num)', 'Juruparkir::delete/$1');

$routes->get('/setoran', 'Setoran::index');
$routes->get('/setoran/create', 'Setoran::create');
$routes->post('/setoran/store', 'Setoran::store');
$routes->get('/setoran/edit/(:num)', 'Setoran::edit/$1');
$routes->post('/setoran/update/(:num)', 'Setoran::update/$1');
$routes->get('/setoran/delete/(:num)', 'Setoran::delete/$1');

$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/create', 'Petugas::create');
$routes->post('/petugas/store', 'Petugas::store');
$routes->get('/petugas/edit/(:num)', 'Petugas::edit/$1');
$routes->post('/petugas/update/(:num)', 'Petugas::update/$1');
$routes->get('/petugas/delete/(:num)', 'Petugas::delete/$1');

$routes->get('/dashboard', 'Dashboard::index');
