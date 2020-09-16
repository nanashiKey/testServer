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
    return "hello this is test server";
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
 * used for user
 */
$router->get('/getalluser', 'UserController@getAllUser');
$router->post('/register', 'UserController@registerUser');
$router->post('/masuk', 'UserController@userLogin');
$router->post('/deluser', 'UserController@delUser');
$router->get('/user/{id}', 'UserController@userById');

/**
 * used for barang
 */
$router->get('/getallbarang', 'BarangController@getAllBarang');
$router->post('/uploadbarang', 'BarangController@createData');
$router->post('/deletebarang', 'BarangController@deleteBarang');
$router->post('/barang/{id}', 'BarangController@updateBarang');
$router->post('/beli', 'BarangController@beliItem');
/**
 * used for hadiah
 */
$router->get('/getallhadiah', 'HadiahController@getAllHadiah');
$router->post('/uploadhadiah', 'HadiahController@createData');
$router->post('/redeemed','HadiahController@redeemedPoint');
$router->post('/hadiah/{id}', 'HadiahController@updateHadiah');
$router->post('/delhadiah/{id}', 'HadiahController@deleteHadiah');
