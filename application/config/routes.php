<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['priceplans'] = 'home/priceplans';
$route['wallet'] = 'Services/wallet';
$route['topup'] = 'Services/topup';
$route['success'] = 'Services/success';
$route['error'] = 'Services/error';
$route['statement/(:num)'] = 'Services/statement/$1';
$route['bookcar/(:num)'] = 'welcome/checkbooking/$1';
// $route['driver'] = 'home/driver';
$route['admin/(:any)'] = 'admin/modx/$1';
$route['booking/(:num)'] = 'services/booking/$1';
$route['about'] = 'systems/about';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
