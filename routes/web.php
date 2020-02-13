<?php

Auth::routes();
/******************* backend route ****************************/
View::creator('admin.layouts.header', function ($view){
    $view->with('admin' , \App\Admin::find(1));
    $view->with('paynots' , \App\Notification::where('type' , 'App\Notifications\PayNotification')->count());
    $view->with('usernots' , \App\Notification::where('type' , 'App\Notifications\UserNotification')->count());
    $view->with('flwrnots' , \App\Notification::where('type' , 'App\Notifications\FlowercomNotification')->count());
    $view->with('shopnots' , \App\Notification::where('type' , 'App\Notifications\ShopcomNotification')->count());
    $view->with('newshopnots' , \App\Notification::where('type' , 'App\Notifications\CreateshopNotification')->count());

});
//Route::group(['middleware'=>'admin'],function(){

//
//Route::group(['middleware' => 'auth:admin'], function() {
// home route
    Route::resource('admin/home' , 'AdminController');
// pages route
    Route::resource('admin/pages' , 'PagesController');
// banks-info route
    Route::resource('admin/bank_accounts' , 'BankController');
//users route
    Route::resource('admin/user' , 'UserController');
//pay route
    Route::resource('admin/pay' , 'PayController');
//order route
    Route::resource('admin/order' , 'OrderController');
//option route
    Route::resource('admin/option' , 'OptionController');
//category route
    Route::resource('admin/category' , 'CategoryController');
//category route
    Route::resource('admin/shop' , 'ShopController');
//slider route
    Route::resource('admin/slider' , 'SliderController');
    //down slider

//subcategory route
    Route::resource('admin/designer' , 'designerController');
//flower route
    Route::resource('admin/flower' , 'FlowerController');
//address route
    Route::resource('admin/warda' , 'wardaController');
//addition route
    Route::resource('admin/addition' , 'AdditionController');
//addition category route
    Route::resource('admin/additioncategory' , 'AdditionCategoryController');
//flowersize route
    Route::resource('admin/flowersize' , 'FlowersizeController');
//card route
    Route::resource('admin/card' , 'CardController');
//comments route
    Route::resource('admin/flowercomment' , 'flowercommentcontroller');
    Route::resource('admin/shopcomment' , 'shopcommentcontroller');
// country route
    Route::resource('admin/country' , 'CountryController');    
// **************** /. delete images Route ******************************/
    //flower images
    Route::get('admin/deleteimage/{id}' , 'FlowerController@deletegallery')->name('deleteimages');
    Route::get('admin/delete/{id}' , 'FlowerController@delete')->name('deleteimage');
    //page image
    Route::get('admin/pagedelete/{id}' , 'PagesController@delete')->name('pagedeleteimage');
    //subcategory image
    Route::get('admin/subdelete/{id}' , 'SubcategoryController@delete')->name('subdeleteimage');
    //category image
    Route::get('admin/categorydelete/{id}' , 'CategoryController@delete')->name('categorydeleteimage');
    //category image
    Route::get('admin/shopdelete/{id}' , 'ShopController@delete')->name('shopdeleteimage');
    //slider image
    Route::get('admin/sliderdelete/{id}' , 'SliderController@delete')->name('sliderdeleteimage');
    //user image
    Route::get('admin/userdelete/{id}' , 'UserController@delete')->name('userdeleteimage');
    //addition image
    Route::get('admin/additiondelete/{id}' , 'AdditionController@delete')->name('additiondeleteimage');
//});
//});
// admin login route
Route::get('login','admin@getLogin')->name('login');

Route::post('login', 'admin@postLogin')->name('login');

Route::get('admin/login', 'AdminAuthController@showLoginFrom')->name('adminLogin');
Route::post('admin/login', 'AdminAuthController@login')->name('adminlogin');
Route::get('admin', 'AdminAuthController@showLoginFrom');

Route::post('deletenot' , 'AdminController@deletenot');
/******************************  frontend *******************************/
Route::get('/', function () {
    return view('home');
});




