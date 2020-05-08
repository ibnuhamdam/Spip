<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';
$route['404_override'] = 'errors/error_404';
$route['translate_uri_dashes'] = FALSE;

// role
$route['role'] = 'user/role';
// detail_ppk
$route['detail_ppk'] = 'ppk/detail_ppk';
$route['detail_ppk/delete'] = 'ppk/detail_ppk/delete';
// form
// ==============================================
// form 8
$route['form_8'] = 'form/form_8';
$route['form_8/index/(:any)'] = 'form/form_8/index/$1';
//$route['form_8/dummy'] = 'form/form_8/dummy';
$route['form_8/create'] = 'form/form_8/create';
$route['form_8/show/(:any)'] = 'form/form_8/show/$1';
$route['form_8/done/(:any)'] = 'form/form_8/done/$1';
// ==============================================
// detail form 8
$route['detail_form_8/create'] = 'form/detail_form_8/create';
$route['detail_form_8/show/(:any)'] = 'form/detail_form_8/show/$1';
$route['detail_form_8/create/(:any)'] = 'form/detail_form_8/create/$1';
$route['detail_form_8/edit/(:any)'] = 'form/detail_form_8/edit/$1';
// ==============================================
// form 11
$route['form_11'] = 'form/form_11';
$route['form_11/show/(:any)'] = 'form/form_11/show/$1';
$route['form_11/create/(:any)'] = 'form/form_11/create/$1';
$route['form_11/edit/(:any)'] = 'form/form_11/edit/$1';
// ==============================================
// form 14
$route['form_14'] = 'form/form_14';
$route['form_14/create/(:any)'] = 'form/form_14/create/$1';
$route['form_14/show/(:any)'] = 'form/form_14/show/$1';
$route['form_14/done/(:any)'] = 'form/form_14/done/$1';
// ==============================================
// detail form 14
$route['detail_form_14/show/(:any)'] = 'form/detail_form_14/show/$1';
$route['detail_form_14/create/(:any)/(:any)'] = 'form/detail_form_14/create/$1/$2';
$route['detail_form_14/edit/(:any)'] = 'form/detail_form_14/edit/$1';
// ==============================================
// form 17
$route['form_17'] = 'form/form_17';
$route['form_17/create/(:any)'] = 'form/form_17/create/$1';
$route['form_17/show/(:any)'] = 'form/form_17/show/$1';
$route['form_17/done/(:any)'] = 'form/form_17/done/$1';
// ==============================================
// detail form 17
$route['detail_form_17/show/(:any)'] = 'form/detail_form_17/show/$1';
$route['detail_form_17/create/(:any)/(:any)'] = 'form/detail_form_17/create/$1/$2';
$route['detail_form_17/edit/(:any)'] = 'form/detail_form_17/edit/$1';
// ==============================================
// form 22
$route['form_22'] = 'form/form_22';
$route['form_22/create/(:any)'] = 'form/form_22/create/$1';
$route['form_22/show/(:any)'] = 'form/form_22/show/$1';
// ==============================================
// detail form 22
$route['detail_form_22/show/(:any)'] = 'form/detail_form_22/show/$1';
$route['detail_form_22/create/(:any)/(:any)'] = 'form/detail_form_22/create/$1/$2';
$route['detail_form_22/edit/(:any)'] = 'form/detail_form_22/edit/$1';
