<?php

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
use App\model\User;
use App\Event\MessageSent;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/termsandconditions', function () {
  return view('termsandconditions');
});

Route::get('/manual', function () {
  return view('usermanual');
});

Route::get('/notifications', function () {
    return view('notifications');
});

Route::get('/tip/select','TipController@select');

Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/deleteuser','HomeController@deleteuser');
Route::get('/home/editprofile',['middleware'=>'auth','uses'=>'HomeController@getprofile'])->name('tip.edit');
Route::post('/home/editprofile',['middleware'=>'auth','uses'=>'HomeController@updateprofile']);
Route::get('/home/{id?}/deletepost',['middleware'=>'auth','uses'=>'HomeController@deletepost']);

Route::get('/about', function(){
   return view('about');   });

Route::get('/tipmap', 'MapController@gmaps');

Route::get('/', 'TipController@HomePage');
Route::get('/search','TipController@search');


Route::post('/tip/{id}/like', 'TipController@postLikeTip');
Route::delete('/tip/{id}/like', 'TipController@deleteLikeTip');


Route::post('/tip/select', 'TipController@addComment');
Route::get('/tip/create',['middleware'=>'auth','uses'=>'TipController@create'])->name('tip.create');
Route::post('/tip/create',['middleware'=>'auth','uses'=>'TipController@store'])->name('tip.create.post');
Route::get('/tip/{id?}/edit','TipController@edit');
Route::post('/tip/{id?}/edit','TipController@update');
Route::get('/tip/{tip?}','TipController@show')->name('show');

Route::get('/category','CategoryController@index');
Route::get('/category/create',['middleware'=>'auth', 'uses'=>'CategoryController@create']);
Route::post('/category/create','CategoryController@store');
Route::get('tip/category/{category}','CategoryController@getCat')->name('category');

Route::get('/avatar', ['middleware'=>'auth', 'uses'=>'API\APIController@avatar'])->name('users.avatar');
Route::get('/user/index','API\APIController@index');
Route::get('/users/{user}/followings', 'API\APIController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'API\APIController@followers')->name('users.followers');

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/profile/{user}', 'HomeController@profile')->name('profile');
Route::get('/profile/{user}/edit', 'HomeController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'HomeController@update')->name('profile.update');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/blog','BlogController@index');
Route::get('/blog','BlogController@tip');

Route::get('/keyword','KeywordsController@index');
Route::get('/keyword/create',['middleware'=>'auth', 'uses'=>'KeywordsController@create']);
Route::post('/keyword/create','KeywordsController@store');

Route::get('/subcategory','SubcategoriesController@index');
Route::get('/subcategory/create',['middleware'=>'auth', 'uses'=>'SubcategoriesController@create']);
Route::post('/subcategory/create','SubcategoriesController@store');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//Laravel decomposer route
Route::group(['middleware'=>'auth'],function (){
  Route::get('decompose','\Lubusin\Decomposer\Controllers\DecomposerController@index');
});
