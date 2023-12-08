<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Home::index');

$routes->get('dashboard', 'DashboardController::index');

$routes->post('offices/list', 'OfficeController::list');
$routes->post('tickets/list', 'TicketController::list');

$routes->resource('offices', ['controller'=>'OfficeController', 'except'=>'new,edit']);
$routes->resource('tickets', ['controller'=>'TicketController', 'except'=>'new,edit']);

service('auth')->routes($routes);
