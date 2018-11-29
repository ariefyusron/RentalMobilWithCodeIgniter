<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';

$route['auth'] = 'login/auth';
$route['logout'] = 'login/logout';

$route['app/addmobil'] = 'app/addmobil';
$route['app/hapusmobil/(:any)'] = 'app/hapusmobil/$1';
$route['app/editmobil'] = 'app/editmobil';
$route['app/addpenyewa'] = 'app/addpenyewa';
$route['app/editpenyewa'] = 'app/editpenyewa';
$route['app/hapuspenyewa/(:any)'] = 'app/hapuspenyewa/$1';
$route['app/gantifoto'] = 'app/gantifoto';
$route['app/gantipassword'] = 'app/gantipassword';
$route['app/cetak'] = 'app/cetak';
$route['app/(:any)'] = 'app/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;