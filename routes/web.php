<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
/**
 * used for generating string random
 */
$router->get('/key', function(){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($chars);
    $randomString = '';
    for ($i = 0; $i < 32; $i++) {
        $randomString .= $chars[rand(0, $charLength - 1)];
    }
    return $randomString;
});

/**
 * used for getAllBarang
 */
$router->get('/getallbarang', 'BarangController@createData');