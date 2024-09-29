<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// 

$routes->get(from: '/', to: 'AuthController::login');
$routes->get(from: 'register', to: 'AuthController::register');
$routes->post(from: 'register', to: 'AuthController::attemptRegister');
$routes->get(from: 'login', to: 'AuthController::login');
$routes->post(from: 'login', to: 'AuthController::attemptLogin');

$routes->get(from: '/posts', to: 'PostController::index');
$routes->get(from: '/posts/create', to: 'PostController::create');
$routes->post(from: '/posts/store', to: 'PostController::store');
$routes->get(from: '/posts/edit/(:num)', to: 'PostController::edit/$1');
$routes->post(from: '/posts/update/(:num)', to: 'PostController::update/$1');
$routes->get(from: '/posts/delete/(:num)', to: 'PostController::delete/$1');
$routes->get('posts/edit/(:num)', 'PostController::edit/$1');
$routes->post('posts/update/(:num)', 'PostController::update/$1');
$routes->get(from: '/logout', to: 'AuthController::logout');
