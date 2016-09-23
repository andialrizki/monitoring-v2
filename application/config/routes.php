<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "fe_singlepage";
$route['home'] = 'fe_homepage';
$route['404_override'] = 'fe_error';

/*
| -------------------------------------------------------------------------
| BLOCK ROUTES
| ------------------------------------------------------------------------- */

$route['fe_(:any)'] = "fe_error";
$route['be_(:any)'] = "fe_error";

/*
| -------------------------------------------------------------------------
| ALLOW ROUTES
| ------------------------------------------------------------------------- */

$route['404'] = "fe_error";
$route['sign-in'] = "fe_login";
$route['sign-in/auth'] = "fe_login/do_login";
$route['sign-out'] = "fe_login/do_logout";

// manage-admin
$route['manage-admin'] = "fe_admin";
$route['manage-admin/add'] = "fe_admin/add_admin";
$route['manage-admin/edit/(:num)'] = "fe_admin/edit_admin";
$route['manage-admin/submit'] = "fe_admin/submit_admin";
$route['manage-admin/del'] = "fe_admin/del_admin";

$route['pelanggan'] = "fe_pengecer";
$route['pelanggan/add'] = "fe_pengecer/add_pengecer";
$route['pelanggan/edit/(:num)'] = "fe_pengecer/edit_pengecer";
$route['pelanggan/submit'] = "fe_pengecer/submit_pengecer";
$route['pelanggan/del'] = "fe_pengecer/del_pengecer";
$route['pelanggan/detail/(:num)'] = "fe_pengecer/detail_pengecer";

$route['([a-z]+)'] = "fe_$1";
$route['([a-z]+)/add'] = "fe_$1/add_$1";
$route['([a-z]+)/edit/(:num)'] = "fe_$1/edit_$1";
$route['([a-z]+)/submit'] = "fe_$1/submit_$1";
$route['([a-z]+)/del'] = "fe_$1/del_$1";
$route['([a-z]+)/detail/(:any)'] = "fe_$1/detail_$1";

$route['([a-z]+)-([a-z]+)'] = "fe_$1_$2";
$route['([a-z]+)-([a-z]+)/add'] = "fe_$1_$2/add_$1_$2";
$route['([a-z]+)-([a-z]+)/edit/(:num)'] = "fe_$1_$2/edit_$1_$2";
$route['([a-z]+)-([a-z]+)/submit'] = "fe_$1_$2/submit_$1_$2";
$route['([a-z]+)-([a-z]+)/del'] = "fe_$1_$2/del_$1_$2";
$route['([a-z]+)-([a-z]+)/detail/(:num)'] = "fe_$1_$2/detail_$1_$2";

$route['perubahan-pangkalan'] = "fe_pangkalan/perubahan_pangkalan";
$route['profile/password'] = "fe_profile/edit_password";
$route['lokasi-pelanggan'] = "fe_lokasi/pengecer";
$route['lokasi-agen'] = "fe_lokasi/agen";
$route['lokasi-pangkalan'] = "fe_lokasi/pangkalan";
$route['lokasi-spbe'] = "fe_lokasi/spbe";
$route['transaksi-agen'] = "fe_transaksi/transaksi_agen";
$route['spbe-agen'] = "fe_agen/spbe_agen";
$route['penataan-jarak'] = "fe_penataan_agen/penataan_jarak";

$route['request-password'] = "myhelper/cekpassword";
$route['request-username'] = "myhelper/cekusername";
$route['request-limit'] = "myhelper/ceklimit";
$route['request-harga'] = "myhelper/setharga";

/* End of file routes.php */
/* Location: ./application/config/routes.php */