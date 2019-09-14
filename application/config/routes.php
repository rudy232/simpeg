<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/* Aout buatan sendiri*/
$route['dasbor_admin/detail_pegawai/(:num)/(:num)'] = 'dasbor_admin/cuti/detail/$1/$2';
$route['dasbor_admin/cuti_pegawai'] = 'dasbor_admin/cuti';
$route['dasbor_admin/cuti_pegawai/laporan_cuti'] = 'dasbor_admin/cuti/laporan_cuti';
$route['dasbor_superadmin/detail_pegawai/(:num)/(:num)'] = 'dasbor_superadmin/cuti/detail/$1/$2';
$route['dasbor_superadmin/cuti_pegawai'] = 'dasbor_superadmin/cuti';
$route['dasbor_superadmin/total_cuti_pegawai'] = 'dasbor_superadmin/cuti/total_cuti';
$route['dasbor_superadmin/cuti_pegawai/laporan_cuti'] = 'dasbor_superadmin/cuti/laporan_cuti';
$route['dasbor_users/detail_pegawai'] = 'dasbor_users/cuti/detail';
$route['dasbor_admin/pengaturan_cuti'] = 'dasbor_admin/cuti/setting_cuti';
$route['dasbor_superadmin/pengaturan_cuti'] = 'dasbor_superadmin/cuti/setting_cuti';
/*Rout default dari codeighniter*/
$route['default_controller'] = '';
$route['404_override'] = 'Blank';
$route['translate_uri_dashes'] = FALSE;
