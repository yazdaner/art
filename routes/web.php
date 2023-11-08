<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

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

Route::get('test',function(){

    $response = Http::withHeader('$API','ZUNDIpNCPQrQJP6vtcyaqAeriwA=')->post('https://panel.spotplayer.ir/license/edit/',[
        "test" => true,
        "course" => ["654344fc93423d0ad025033f"],
        "name" => "customer",
        "watermark" =>  ['texts' => [['text'=>'09121112266']]]
        ]);
    dd($response->json());
});
