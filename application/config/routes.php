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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['404_override'] = 'custom404';
$route['translate_uri_dashes'] = TRUE;

// Route Login
$route['default_controller'] = 'auth/login';
$route['proses-login'] = 'auth/proses_login';
$route['lupa-password'] = 'auth/lupa_password';
$route['kirim-reset-password'] = 'auth/send_reset_link';
$route['reset-password'] = 'auth/reset_password';
$route['proses-reset-password'] = 'auth/proses_reset_password';

// Route Pelanggan
$route['pelanggan/kuesioner'] = 'kuesioner/index';
$route['pelanggan/isi-kuesioner'] = 'jawaban/tambah_jawaban';
$route['pelanggan/proses-isi-kuesioner'] = 'jawaban/proses_tambah_jawaban';

// Route Manajer
$route['manajer/dashboard'] = 'dashboard/dashboard_manajer';
$route['manajer/data-pengguna'] = 'pengguna/index';
$route['manajer/tambah-pengguna'] = 'pengguna/tambah_pengguna';
$route['manajer/proses-tambah-pengguna'] = 'pengguna/proses_tambah_pengguna';
$route['manajer/edit-pengguna'] = 'pengguna/edit_pengguna';
$route['manajer/proses-edit-pengguna'] = 'pengguna/proses_edit_pengguna';
$route['manajer/proses-hapus-pengguna'] = 'pengguna/proses_hapus_pengguna';
$route['manajer/data-lokasi-server'] = 'lokasi_server/index';
$route['manajer/tambah-lokasi-server'] = 'lokasi_server/tambah_lokasi_server';
$route['manajer/proses-tambah-lokasi-server'] = 'lokasi_server/proses_tambah_lokasi_server';
$route['manajer/edit-lokasi-server'] = 'lokasi_server/edit_lokasi_server';
$route['manajer/proses-edit-lokasi-server'] = 'lokasi_server/proses_edit_lokasi_server';
$route['manajer/proses-hapus-lokasi-server'] = 'lokasi_server/proses_hapus_lokasi_server';
$route['manajer/data-kuesioner'] = 'kuesioner/index';



// Route admin
$route['admin/dashboard'] = 'dashboard/dashboard_admin';
$route['admin/data-pengguna'] = 'pengguna/index';
$route['admin/data-kuesioner'] = 'kuesioner/index';
$route['admin/tambah-kuesioner'] = 'kuesioner/tambah_kuesioner';
$route['admin/proses-tambah-kuesioner'] = 'kuesioner/proses_tambah_kuesioner';
$route['admin/edit-kuesioner'] = 'kuesioner/edit_kuesioner';
$route['admin/proses-edit-kuesioner'] = 'kuesioner/proses_edit_kuesioner';
$route['admin/proses-hapus-kuesioner'] = 'kuesioner/proses_hapus_kuesioner';

// Route Profil
$route['profil'] = 'profil/index';
$route['profil/proses-edit-profil'] = 'profil/proses_edit_profil';
