<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Test::index');
$routes->post('/auth/store', 'AuthController::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->get('/dashboard', 'DashBoardController::index', ['filter' => 'auth']);
$routes->get('/profile', 'DashBoardController::profile', ['filter' => 'auth']);
$routes->post('/dashboard/updateProfile', 'DashBoardController::updateProfile', ['filter' => 'auth']);

$routes->get('/search', 'SearchController::index', ['filter' => 'auth']);
$routes->post('/search/results', 'SearchController::results', ['filter' => 'auth']);
