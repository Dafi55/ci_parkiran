<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/main', 'Home::main');
$routes->get('/juruparkir', 'juruparkir::index');
