<?php

use System\Middlewares\BeforeLayer;
use System\Middlewares\AfterLayer;

// define Web Routes.
// Format :
// Route::method('url', function() {
// 		Route::goto('namespace\class_controller@method');
// });
//
// Route::method('url/@id:num', function($id) {
// 		Route::goto('namespace\class_controller@method', $id);
// });
// Route method : any|get|post|put|patch|delete|head|options

/**
 * Login Module
 */
Route::group('', function () {
	Route::get('/', function () {
		$middleware = [
			new BeforeLayer(),
			new AfterLayer()
		];
		Route::middleware($middleware)->for([System\Apps\Modules\Login\Controllers\C_Login::class, 'login_form']);
	});
	Route::any('/login', [System\Apps\Modules\Login\Controllers\C_Login::class, 'login_process']);
	Route::any('/logout', [System\Apps\Modules\Login\Controllers\C_Login::class, 'logout_process']);
	Route::any('/forgot', [System\Apps\Modules\Login\Controllers\C_Register::class, 'forgot_form']);
	Route::any('/forgot/process', [System\Apps\Modules\Login\Controllers\C_Register::class, 'forgot_process']);
	Route::any('/reset', [System\Apps\Modules\Login\Controllers\C_Register::class, 'reset_form']);
	Route::any('/reset/process', [System\Apps\Modules\Login\Controllers\C_Register::class, 'reset_process']);
	Route::any('/register', [System\Apps\Modules\Login\Controllers\C_Register::class, 'register_form']);
	Route::any('/register/insert', [System\Apps\Modules\Login\Controllers\C_Register::class, 'register_insert']);
});

/**
 * Dashboard Module
 */
Route::group('/dashboard', function () {
	Route::any('/delete/(:num)', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'delete_data']);
	Route::any('/multidelete', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'multidelete_data']);
	Route::any('/update/(:num)', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'update_data']);
	Route::any('/fetch/(:num)', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'fetch_data']);
	Route::any('/data.json', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'get_data']);

	Route::any('', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'admin_page']);
	Route::any('/tables', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'tables_page']);
	Route::any('/forms', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'forms_page']);
	Route::any('/profile', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'profile_page']);
	Route::any('/homepage', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'homepage']);
	Route::any('/crud', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'crud_page']);

	Route::any('/user1', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'user1_page']);
	Route::any('/user2', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'user2_page']);
	Route::any('/user3', [System\Apps\Modules\Dashboard\Controllers\C_Dashboard::class, 'user3_page']);
});
