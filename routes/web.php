<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/envtest', function () {
//     return [
//         'DB_HOST' => env('DB_HOST'),
//         'MYSQL_ATTR_SSL_CA' => env('MYSQL_ATTR_SSL_CA'),
//     ];
// });

Route::get('/envtest', function () {
    return response()->json([
        'env'            => env('APP_ENV'),
        'app_url'        => env('APP_URL'),
        'db_exists'      => DB::connection()->getDatabaseName(),
        'ssl_ca_exists'  => file_exists(env('MYSQL_ATTR_SSL_CA')) ? 'yes' : 'no',
        'ssl_path'       => env('MYSQL_ATTR_SSL_CA'),
    ]);
});
