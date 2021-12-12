<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::post('/login/post', 'AdminLogin@adminCrediential')->name('login.admin');
Route::post('/register/post', 'AdminLogin@adminregister')->name('register.admin');

Route::get('/', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/cart', 'ClientController@cart');
Route::get('search', 'ClientController@search')->name('search');
Route::get('/signup', 'ClientController@signup');
Route::get('/client_login', 'ClientController@login')->name('client_login');
Route::get('/addToCart/{id}', 'ClientController@addToCart');
Route::post('/updateqty','ClientController@updateqty');
Route::get('/removeitem/{id}', 'ClientController@removeitem');
Route::get('/checkout', 'ClientController@checkout');
Route::post('/createaccount','ClientController@createaccount');
Route::get('/view_by_cat/{name}', 'ClientController@view_by_cat');
Route::get('/view_by_loc/{name}', 'ClientController@view_by_loc');
Route::post('/accessaccount','ClientController@accessaccount');

Route::group(['middleware' => ['web']], function () {
// admin+user
    Route::post('/postcheckout','ClientController@postcheckout')->name('postcheckout');
    Route::post('/postreport','ClientController@postreport')->name('postreport');

    Route::get('/view_pdf/{id}', 'PdfController@view_pdf');
    // user
    Route::get('/dashboard', 'ClientController@dashboard')->name('dashboard');
    Route::get('/editdashboard', 'ClientController@editdashboard')->name('editdashboard');
    Route::post('/updatedashboard', 'ClientController@updatedashboard')->name('updatedashboard');
    Route::get('/compare', 'ClientController@compare')->name('compare');
    Route::get('searchloc', 'ClientController@searchloc')->name('searchloc');
    Route::get('/report', 'ClientController@report')->name('report');

//admin


});

Route::group(['prefix'=>'','middleware'=>['admin']],function(){
    Route::get('/admin', 'AdminController@dashboard')->name('admin');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::get('/editprofile', 'AdminController@editprofile')->name('editprofile');
    Route::post('/updateprofile', 'AdminController@updateprofile')->name('updateprofile');
    Route::get('/orders', 'AdminController@orders');
    Route::get('/complains', 'AdminController@complains');
    Route::get('/addcategory', 'CategoryController@addcategory');
    Route::post('/savecategory', 'CategoryController@savecategory');
    Route::get('/categories', 'CategoryController@categories');
    Route::get('/edit_category/{id}', 'CategoryController@edit');
    Route::post('updatecategory', 'CategoryController@updatecategory');
    Route::get('/delete/{id}', 'CategoryController@delete');

    Route::get('/addlocation', 'LocationController@addlocation');
    Route::post('/savelocation', 'LocationController@savelocation');
    Route::get('/locations', 'LocationController@locations');
    Route::get('/edit_location/{id}', 'LocationController@edit');
    Route::post('updatelocation', 'LocationController@updatelocation');
    Route::get('/delete/{id}', 'LocationController@delete');

    Route::get('/addproduct', 'ProductController@addproduct');
    Route::get('/products', 'ProductController@products');
    Route::post('/saveproduct', 'ProductController@saveproduct');
    Route::get('/edit_product/{id}', 'ProductController@editproduct');
    Route::post('updateproduct', 'ProductController@updateproduct');
    Route::get('/delete_product/{id}', 'ProductController@deleteproduct');
    Route::get('/deactivate_product/{id}', 'ProductController@deactivateproduct');
    Route::get('/activate_product/{id}', 'ProductController@activateproduct');
    Route::get('/varify_complain/{id}', 'AdminController@varifycomplain');
    Route::get('/takestep_complain/{id}', 'AdminController@takestep');




    Route::get('/sliders', 'SliderController@sliders');
    Route::get('/addslider', 'SliderController@addslider');
    Route::post('/saveslider', 'SliderController@saveslider');
    Route::get('/edit_slider/{id}', 'SliderController@editslider');
    Route::post('updateslider', 'SliderController@updateslider');
    Route::get('/delete_slider/{id}', 'SliderController@deleteslider');
    Route::get('/deactivate_slider/{id}', 'SliderController@deactivateslider');
    Route::get('/activate_slider/{id}', 'SliderController@activateslider');






    Route::get('/home', 'HomeController@index')->name('home');
});
