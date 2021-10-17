<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/example', function(){
    // $url = 'https://jsonplaceholder.typicode.com/todos';

    // $response = Http::get('https://api.github.com');
    // $data = $response->json();
    // dd($data);

    $key = env('HOTPEPPER_KEY');
    $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key='.$key.'&name=あ&format=json';
    
    $response = Http::get($url);
    $data = json_decode($response,true);
    // $result = $data['results']['shop'];
    $result = array_column($data['results']['shop'], 'name');

    dd($result);
});
