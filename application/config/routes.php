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
$route['default_controller']   = 'auth';//Cidx
$route['Cidx']='Cidx';//nuevo
//rutas del sistema ion_auth
$route['auth']   = 'auth';
$route['auth/index1']   = 'auth/index1';
$route['auth/login']   = 'auth/login';
$route['auth/logout']   = 'auth/logout';
$route['auth/change_password']   = 'auth/change_password';
$route['auth/forgot_password']   = 'auth/forgot_password';
$route['auth/reset_password/(:num)']   = 'auth/reset_password/$1';
$route['auth/activate/(:num)/(:num)']   = 'auth/reset_password/$1/$1';
$route['auth/deactivate/(:num)']   = 'auth/deactivate/$1';
$route['auth/create_user']   = 'auth/create_user';
$route['auth/redirectUser']   = 'auth/redirectUser';
$route['auth/edit_user/(:num)']   = 'auth/edit_user/$1';
$route['auth/create_group']   = 'auth/create_group';
$route['auth/edit_group/(:num)']   = 'auth/edit_group/$1';
$route['auth/_get_csrf_nonce']   = 'auth/_get_csrf_nonce';
$route['auth/_valid_csrf_nonce']   = 'auth/_valid_csrf_nonce';
//linea
$route['linea_controller']   = 'linea_controller';
$route['linea_controller/remove/(:num)']   = 'linea_controller/remove/$1';
$route['linea_controller/add']   = 'linea_controller/add';
$route['linea_controller/edit/(:num)']   = 'linea_controller/edit/$1';
//operario
$route['operario_controller']   = 'operario_controller';
$route['operario_controller/remove/(:num)']   = 'operario_controller/remove/$1';
$route['operario_controller/add']   = 'operario_controller/add';
$route['operario_controller/edit/(:num)']   = 'operario_controller/edit/$1';
//autorizaciones de trabajo
$route['trabajo_controller']='trabajo_controller';
$route['trabajo_controller/index_abiertas']='trabajo_controller/index_abiertas';
$route['trabajo_controller/add']   = 'trabajo_controller/add';
$route['trabajo_controller/edit/(:any)']   = 'trabajo_controller/edit/$1';
$route['trabajo_open_controller']='trabajo_open_controller';
//
//consignas
$route['consigna_controller']='consigna_controller';
$route['consigna_controller/index_abiertas']='consigna_controller/index_abiertas';
$route['consigna_controller/add']   = 'consigna_controller/add';
$route['consigna_controller/edit/(:any)']   = 'consigna_controller/edit/$1';
//
$route['404_override']         = 'Cidx/page_not_found' ;
$route['translate_uri_dashes'] = FALSE           ;

$route[ 'login'           ] = "auth/Cidx/login"       ;
$route[ 'login/(:any)'    ] = "auth/Cidx/login/$1"    ; // $1 = redirect
$route[ 'logout'          ] = "auth/Cidx/logout"      ;
$route[ 'logout/(:any)'   ] = "auth/Cidx/logout/$1"   ; // $1 = redirect
$route[ 'register'        ] = "auth/Cidx/register"    ;
$route[ 'register/(:any)' ] = "auth/Cidx/register/$1" ; // $1 = redirect"   ;

// TEST -> commented in production
$route[ 'test'            ] = 'test/Cidx'             ; 

// mai
$route[ 'mail_me'         ] = 'Cidx/mail_me'          ;
$route[ 'api'             ] = 'Cidx/api'              ;

#leave it at the end the default
$route[ '(:any)'                             ] = 'Cidx/index/$1'             ;
$route[ '(:any)/(:any)'                      ] = 'Cidx/index/$1/$2'          ;
$route[ '(:any)/(:any)/(:any)'               ] = 'Cidx/index/$1/$2/$3'       ;
$route[ '(:any)/(:any)/(:any)/(:any)'        ] = 'Cidx/index/$1/$2/$3/$4'    ;
$route[ '(:any)/(:any)/(:any)/(:any)/(:any)' ] = 'Cidx/index/$1/$2/$3/$4/$5' ;
