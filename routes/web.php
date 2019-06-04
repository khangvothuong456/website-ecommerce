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

Route::get('/','HomeController@index')->name('home');
Route::get('tim-kiem','HomeController@search')->name('search');
Route::get('gio-hang','HomeController@getCart')->name('cart.show');
Route::post('dang-nhap','UserController@login')->name('login');
Route::get('dang-xuat','UserController@logout')->name('logout');
Route::get('dang-ky','UserController@getRegister')->name('register.create');
Route::post('dang-ky','UserController@postRegister')->name('register.store');
Route::get('xac-minh-tai-khoan/{token}','UserController@userActivation')->name('user_activation');

Route::get('san-pham/{name_url}','HomeController@detailsProduct')->name('details_product');
Route::get('thuoc-tinh-san-pham/{id}',function($id){
    return response()->json(App\Pro_Attr::findOrFail($id));
});


// chỉ khi đăng nhập mới vào được những trang này
Route::group(['middleware'=>'UserLogin'],function(){
    
    Route::get('thanh-toan','HomeController@getCheckout')->name('checkout.create');
    Route::post('thanh-toan','HomeController@postCheckout')->name('checkout.store');

    // sử dụng cho người bán
    Route::group(['prefix'=>'kenh-nguoi-ban'],function(){
        Route::get('trang-chu','MerchantController@merchantChannel')->name('merchant-channel');

        Route::get('san-pham/tat-ca','MerchantController@getProductManagementM')->name('product-M.index');
        Route::get('san-pham/them','MerchantController@getInsertProductM')->name('product-M.create');
        Route::post('san-pham/them','MerchantController@postInsertProductM')->name('product-M.store');
        
        Route::get('don-hang/tat-ca','MerchantController@getBillManagementM')->name('manage-bill-M');
        Route::get('vi/tat-ca','MerchantController@getWalletManagementM')->name('manage-wallet-M');        
    });
});

// quản lý trang admin
Route::get('admin/login','UserController@getAdminLogin');
Route::post('admin/login','UserController@postAdminLogin');
Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
    Route::get('/',function(){ return view('admin.master'); })->name('dashboard');

    Route::group(['prefix'=>'category'],function(){
        Route::get('/','CategoryController@index')->name('category');
        Route::post('/store','CategoryController@store')->name('category.store');
        Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}','CategoryController@update')->name('category.update');
        Route::get('/destroy/{id}','CategoryController@destroy')->name('category.destroy');
    });

    Route::group(['prefix'=>'slide-show'],function(){
        Route::get('/',function(){ return view('admin.pages.slideshow.index'); })->name('slideShow');
        Route::post('/store','SlideShowController@store')->name('slideShow.store');
    });
});