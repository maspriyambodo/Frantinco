<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
$route['Laporan1%(:any)'] = 'Report/Brand/Bulan/index/';
$route['Laporan2%(:any)'] = 'Report/Category/Bulan/index/';
$route['Laporan3%(:any)'] = 'Report/Categorysub/Bulan/index/';
$route['Laporan4%(:any)'] = 'Report/Category/Product_report/index/';
$route['Change%(:any)'] = 'Systems/Change/';
$route['Setting%20Profile'] = 'Systems/Profile/';
$route['Dashboard'] = 'Applications/Dashboard/index/';
$route['Signin'] = 'Auth/index/';
$route['404_override'] = 'Error_404';
$route['translate_uri_dashes'] = false;