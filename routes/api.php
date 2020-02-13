<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::resource('flowers', 'api\FlowersController');
//Route::resource('subcategories', 'api\SubcategoriesController');
//Route::resource('users', 'api\UsersController');
//Route::resource('pages', 'api\PagesController');
//Route::resource('addition', 'api\AdditionController');
//Route::resource('addition_categories', 'api\AdditioncategoryController');
//Route::resource('shops', 'api\ShopController');
//Route::resource('sliders', 'api\SliderController');
/**/
//Route::get('banks', 'api\UsersController@bank');
Route::get('flower', 'api\FlowersController@index');
Route::get('designer/{id}', 'api\FlowersController@showdesigner');
Route::get('category/{id}', 'api\FlowersController@showcategory');
Route::get('salary/{id}', 'api\FlowersController@showsalary');
Route::get('sku/{id}', 'api\FlowersController@showsalary');

Route::get('name', 'api\FlowersController@showname');
Route::get('lenght/{id}', 'api\FlowersController@showleng');
Route::get('width/{id}', 'api\FlowersController@showwidth');
Route::get('best', 'api\FlowersController@showbest');
Route::get('status', 'api\FlowersController@showstatus');







//Route::get('cards', 'api\ApiController@cards');
//Route::get('shop/rate/{shop_id}', 'api\ShopController@rate');
//Route::get('shop/showcomments/{shop_id}', 'api\ShopController@showcomment');
//Route::get('flower/showcomments/{flower_id}', 'api\FlowersController@showcomment');
//Route::get('notification', 'api\ApiController@notification');
//Route::get('likes', 'api\LikeController@likes');
//Route::post('likes', 'api\LikeController@add_like');
//Route::post('addflower', 'api\FlowersController@add');
//Route::post('addshop', 'api\ShopController@add');
//Route::post('profile/edit', 'api\UsersController@profileEditSave');
//Route::get('address/{userid}', 'api\ApiController@addresses');
//Route::post('addressSave', 'api\ApiController@addressSave');
//Route::post('addressEditSave/{adressid}', 'api\ApiController@addressEditSave');
//Route::delete('addressDelete/{adressid}', 'api\ApiController@addressDelete');
//Route::post('search', 'api\ApiController@search');
//Route::get('bestflower', 'api\FlowersController@best');
//Route::get('bestshop', 'api\ShopController@best');
//Route::get('country', 'api\ApiController@country');
//Route::get('occasions', 'api\CategoriesController@occasions');
//Route::get('sections', 'api\CategoriesController@sections');
//Route::post('nearshop', 'api\ShopController@nearshops');
//
//Route::post('pays', 'api\PayController@pay_flower');
///* comments */
//Route::post('flowercomment/{flower_id}', 'api\FlowersController@comment');
//Route::post('shopcomment/{shop_id}', 'api\ShopController@comment');
//
//Route::post('register', 'Auth\RegisterController@registerapi');
//Route::post('login', 'Auth\LoginController@loginapi');
//



//Route::get('flower','api/flower@index');
//Route::get('flower/{id}','api/flower@show');
//Route::get('flower/{id}','api/flower@showcategory');
//Route::get('flower/{id}','api/flower@showsalary');
//Route::get('flower/{id}','api/flower@showsku');



