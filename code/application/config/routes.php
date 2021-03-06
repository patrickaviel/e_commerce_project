<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']            = 'main';

$route['login']                         = 'users/login_page';
$route['register']                      = 'users/registration_page';

$route['admin/login']                   = 'admins/admin_login_page';
$route['admin/register']                = 'admins/admin_registration_page';
$route['admin/dashboard']               = 'admins/admin_dashboard';
$route['admin/products']                = '/admins/admin_products';
$route['admin/brands']                  = 'admins/admin_brands';
$route['admin/users']                   = 'admins/admin_users';
$route['order/(:num)']                  = '/checkouts/view_order_admin/$1';

$route['logout']                        = 'users/logout';

// STRIPE API
$route['make-stripe-payment']           = "StripePaymentController";
$route['handleStripePayment']['post']   = "StripePaymentController/handlePayment";

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
