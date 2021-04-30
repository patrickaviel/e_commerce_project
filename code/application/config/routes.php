<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';

$route['login'] = 'users/login_page';
$route['register'] = 'users/registration_page';

$route['admin/login'] = 'users/admin_login_page';

$route['logout'] = 'products/logout';

$route['products'] = 'products/products_page';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
