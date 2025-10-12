<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

// Equipment
$routes->post('/equipment/create', 'Equipment::create');
// Report Cycletime
$routes->get('/reportcycletime', 'ReportCycletime::index');
