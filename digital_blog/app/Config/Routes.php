<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// 

$routes->get(from: '/', to: 'AuthController::login');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');

$routes->get(from: '/posts', to: 'PostController::index');
$routes->get('/posts/create', to: 'PostController::create');
$routes->post(from: '/posts/store', to: 'PostController::store');
$routes->get(from: '/posts/edit/(:num)', to: 'PostController::edit/$1');
$routes->post(from: '/posts/update/(:num)', to: 'PostController::update/$1');
$routes->get(from: '/posts/delete/(:num)', to: 'PostController::delete/$1');
