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
$routes->setAutoRoute(true);


$routes->get('/', 'Home::index');
$routes->get('products', 'Products::index');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/auth/create_user', 'Auth::create_user');
$routes->post('/auth/create_user', 'Auth::create_user');
$routes->get('auth/edit_user/(:num)', 'Auth::edit_user/$1');
$routes->post('auth/edit_user/(:num)', 'Auth::edit_user/$1');
$routes->get('auth/forgot_password', 'Auth::forgot_password');
$routes->post('auth/forgot_password', 'Auth::forgot_password');
$routes->get('produk/(:segment)', 'ProductController::detail/$1');
$routes->get('checkout', 'CheckoutController::index');
$routes->post('checkout', 'CheckoutController::process');
$routes->get('uploads/products/(:any)', 'ImageController::productImage/$1');
$routes->get('payment/simulated/(:num)', 'PaymentController::simulated/$1');
$routes->get('payment/success/(:num)', 'PaymentController::success/$1');
$routes->get('orders/history', 'OrderController::history');
$routes->get('orders/(:num)', 'OrderController::show/$1');



$routes->group('admin', ['filter' => 'admin-auth:admin,operator'],function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('products/trashed', 'Admin\Products::trashed');
    $routes->get('categories', 'Admin\Categories::index'); 
    $routes->get('categories/(:num)', 'Admin\Categories::index/$1');
    $routes->post('categories', 'Admin\Categories::store');
    $routes->put('categories/(:num)', 'Admin\Categories::update/$1');
    $routes->delete('categories/(:num)', 'Admin\Categories::destroy/$1');
    
    $routes->get('attributes', 'Admin\Attributes::index');
    $routes->get('attributes/(:num)', 'Admin\Attributes::index/$1');
    $routes->post('attributes', 'Admin\Attributes::store');
    $routes->put('attributes/(:num)', 'Admin\Attributes::update/$1');
    $routes->delete('attributes/(:num)', 'Admin\Attributes::destroy/$1');
    
    $routes->get('attribute-options', 'Admin\AttributeOptions::index');
    $routes->get('attribute-options/(:num)', 'Admin\AttributeOptions::index/$1');
    $routes->get('attribute-options/(:num)/(:num)', 'Admin\AttributeOptions::index/$1/$2');
    $routes->post('attribute-options', 'Admin\AttributeOptions::store');
    $routes->put('attribute-options/(:num)/(:num)', 'Admin\AttributeOptions::update/$1/$2');
    $routes->delete('attribute-options/(:num)', 'Admin\AttributeOptions::destroy/$1');
    
    $routes->get('brands', 'Admin\Brands::index');
    $routes->get('brands/(:num)', 'Admin\Brands::index/$1');
    $routes->post('brands', 'Admin\Brands::store');
    $routes->put('brands/(:num)', 'Admin\Brands::update/$1');
    $routes->delete('brands/(:num)', 'Admin\Brands::destroy/$1');

    $routes->get('products', 'Admin\Products::index');
    $routes->get('products/form', 'Admin\Products::create');
    $routes->get('products/(:num)', 'Admin\Products::index/$1');
    $routes->get('products/(:num)/edit', 'Admin\Products::edit/$1');
    $routes->post('products', 'Admin\Products::store');
    $routes->put('products/(:num)', 'Admin\Products::update/$1');
    $routes->delete('products/(:num)', 'Admin\Products::destroy/$1');
    $routes->get('products/restore/(:num)', 'Admin\Products::restore/$1');
    $routes->get('products/(:num)/images', 'Admin\Products::images/$1');
    $routes->get('products/(:num)/upload-image', 'Admin\Products::uploadImage/$1');
    $routes->post('products/(:num)/upload-image', 'Admin\Products::doUploadImage/$1');
    $routes->delete('products/images/(:num)', 'Admin\Products::destroyImage/$1');
});



    




