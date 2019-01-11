<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['priceplans'] = 'home/priceplans';
// $route['driver'] = 'home/driver';
$route['admin/(:any)'] = 'admin/modx/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
