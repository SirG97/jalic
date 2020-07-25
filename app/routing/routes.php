<?php

require_once __DIR__.'/../../vendor/altorouter/altorouter/AltoRouter.php';


$router = new Altorouter();

$router->map('GET', '/', '\App\Controllers\IndexController@show', 'home');

$router->map('GET', '/register', '\App\Controllers\AuthController@showregister', 'show_register');
$router->map('POST', '/register', '\App\Controllers\AuthController@register', 'register_user');

// Authentication and login
$router->map('GET', '/login', '\App\Controllers\AuthController@show', 'login');
$router->map('POST', '/login', '\App\Controllers\AuthController@login', 'auth');
$router->map('GET', '/logout', '\App\Controllers\AuthController@logout', 'logout');
$router->map('POST', '/changepassword', '\App\Controllers\SettingsController@change_password', 'change_password');

// Dashboard
$router->map('GET', '/dashboard', '\App\Controllers\DashboardController@show', 'dashboard');
$router->map('POST', '/dashboard', '\App\Controllers\DashboardController@store', 'dt');
$router->map('GET', '/dashboard/chart', '\App\Controllers\DashboardController@chart_info', 'chart');

//Customer Routes
$router->map('GET', '/customers', '\App\Controllers\CustomerController@show', 'customers');
$router->map('GET', '/new_customer', '\App\Controllers\CustomerController@showcustomerform', 'customer');
$router->map('POST', '/new_customer', '\App\Controllers\CustomerController@storecustomer', 'store_customer');
$router->map('GET', '/customer/[:customer_id]', '\App\Controllers\CustomerController@getcustomer', 'get_customer');
$router->map('GET', '/verifycustomer/[:customer_id]', '\App\Controllers\CustomerController@verifycustomer', 'verify_customer');
//$router->map('GET', '/customer/[:contribution_id]', '\App\Controllers\CustomerController@getcontribution', 'get_contribution');
$router->map('POST', '/customer/[:customer_id]/edit', '\App\Controllers\CustomerController@editcustomer', 'edit_customer');
$router->map('POST', '/customer/[:customer_id]/delete', '\App\Controllers\CustomerController@deletecustomer', 'delete_customer');
$router->map('GET', '/customer/[:terms]/search', '\App\Controllers\CustomerController@searchcustomer', 'search_customer');

// Staff routes
$router->map('GET', '/profile', '\App\Controllers\UserController@view_profile', 'profile');

$router->map('GET', '/staff/[:staff_id]', '\App\Controllers\UserController@get_single_staff', 'get_single_staff');
$router->map('GET', '/staff', '\App\Controllers\UserController@get_staff', 'get_staff');
$router->map('GET', '/new_staff', '\App\Controllers\UserController@new_staff_form', 'new_staff_form');
$router->map('POST', '/staff/add', '\App\Controllers\UserController@store_staff', 'store_staff');
$router->map('POST', '/staff/[:user_id]/edit', '\App\Controllers\UserController@edit_staff', 'edit_staff');
$router->map('POST', '/staff/[:user_id]/delete', '\App\Controllers\UserController@delete_staff', 'delete_staff');


//Contributions
$router->map('GET', '/contributions', '\App\Controllers\ContributionController@get_all', 'contributions');
$router->map('GET', '/unapproved', '\App\Controllers\ContributionController@unapproved', 'unapproved');
$router->map('POST', '/transaction/approve', '\App\Controllers\ContributionController@approve', 'approve');
$router->map('GET', '/mark_contribution', '\App\Controllers\ContributionController@contribute_form', 'contribute_form');
$router->map('POST', '/contribute', '\App\Controllers\ContributionController@contribute', 'contribute');
$router->map('GET', '/contributions/[:terms]/search', '\App\Controllers\ContributionController@search_contribution', 'search_contribution');
$router->map('GET', '/message', '\App\Controllers\ContributionController@message', 'message');
$router->map('POST', '/sendsms', '\App\Controllers\ContributionController@send_sms', 'send_message');
$router->map('GET', '/getnumber/[:terms]/search', '\App\Controllers\ContributionController@get_number', 'get_number');

// Settings
$router->map('GET', '/settings', '\App\Controllers\SettingsController@showSettings', 'show_settings');
$router->map('POST', '/settings', '\App\Controllers\SettngsController@settings', 'settings');


//Access Denied and error page
$router->map('GET', '/unauthorized', '\App\Controllers\BaseController@access_denied', 'access_denied');


