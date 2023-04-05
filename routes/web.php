<?php

use App\Jobs\ImportContacts;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use Google\Cloud\Firestore\FirestoreClient;

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
//Route::get('images/{id}/{size?}', ['as' => 'image', 'uses' => 'ImageController@get']);


Auth::routes();

Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
Route::get('/', 'HomeController@index')->name('home');

Route::get('www',function (){
    dd(\App\Models\Order::latest()->first()->getDurationInHour());
});
