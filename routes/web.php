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

Route::get('/login',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);
Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {

    Route::get('/logout',[
        'uses'=>'AuthController@getLogout',
        'as'=>'logout'
    ]);

    Route::get('/dashboard/home',[
        'uses'=>'AdminController@getDashboardHome',
        'as'=>'dashboard.home'
    ]);

    Route::get('/API/report/all',[
        'uses'=>'ProductController@postDashboardReportAll',
    ]);
    Route::get('/API/report/{id}',[
        'uses'=>'ProductController@getAPIReport',
    ]);

    Route::group(['middleware' => ['role:manager|user']], function () {
        Route::get('/dashboard/sale',[
            'uses'=>'ProductController@getSale',
            'as'=>'dashboard.sale.sale'
        ]);
        Route::post('/dashboard/sale/add',[
            'uses'=>'ProductController@postSale',
            'as'=>'dashboard.sale'
        ]);
        Route::get('/dashboard/sale/checkout',[
            'uses'=>'ProductController@getCheckout',
            'as'=>'dashboard.sale.checkout'
        ]);
        Route::get('/dashboard/sale/checkout/cancel',[
            'uses'=>'ProductController@getCheckoutCancel',
            'as'=>'dashboard.sale.checkout.cancel'
        ]);
        Route::get('/dashboard/report',[
            'uses'=>'ProductController@getDashboardReport',
            'as'=>'dashboard.report'
        ]);


        Route::get('/dashboard/add/items',[
            'uses'=>'ProductController@getAddationItem',
            'as'=>'dashboard.add.item'
        ]);
        Route::post('/dashboard/add/items',[
            'uses'=>'ProductController@postAddationItem',
            'as'=>'dashboard.add.item'
        ]);

        Route::group(['middleware' => ['role:manager|super-admin']], function () {
            Route::get('/dashboard/report/all',[
                'uses'=>'ProductController@getDashboardReportAll',
                'as'=>'dashboard.report.all'
            ]);

            Route::get('/dashboard/items/all',[
                'uses'=>'ProductController@getShopItemsAll',
                'as'=>'dashboard.item.all'
            ]);
        });

    });
    ////////////////////////////////////////////
    Route::group(['middleware' => ['role:super-admin']], function () {

        Route::get('/', [
            'uses'=>'AdminController@getWelcome',
            'as'=>'/'
        ]);

        Route::get('/user/add',[
            'uses'=>'AuthController@getAddUser',
            'as'=>'user.add'
        ]);
        Route::post('/user/add',[
            'uses'=>'AuthController@postAddUser',
            'as'=>'user.add'
        ]);

        Route::get('/user/all',[
            'uses'=>'AuthController@getUser',
            'as'=>'user.all'
        ]);

        Route::get('/items/all',[
            'uses'=>'ProductController@getItemsAll',
            'as'=>'items'
        ]);
        Route::get('/items/edit/{id}',[
            'uses'=>'ProductController@getItemsEdit',
            'as'=>'item.edit'
        ]);
        Route::post('/items/all/edit',[
            'uses'=>'ProductController@postItemsAllEdit',
            'as'=>'items.edit'
        ]);

        Route::get('/items/barcode',[
            'uses'=>'ProductController@getBarcode',
            'as'=>'items.barcode'
        ]);
        Route::post('/items/barcode/print',[
            'uses'=>'ProductController@postBarcodePrint',
            'as'=>'items.barcode.print'
        ]);

        Route::get('/items/add',[
            'uses'=>'ProductController@getAddItem',
            'as'=>'items.add'
        ]);
        Route::post('/items/add',[
            'uses'=>'ProductController@postAddItem',
            'as'=>'items.add'
        ]);

        Route::get('/category',[
            'uses'=>'ProductController@getCategory',
            'as'=>'category'
        ]);
        Route::post('/category/add',[
            'uses'=>'ProductController@postCategory',
            'as'=>'category.add'
        ]);
        Route::get('/category/edit/{id}',[
            'uses'=>'ProductController@getCategoryEdit',
            'as'=>'category.edit'
        ]);
        Route::post('/category/edit',[
            'uses'=>'ProductController@postCategoryEdit',
            'as'=>'category.edits'
        ]);

        Route::get('/sale/daily',[
            'uses'=>'AdminController@getDailySale',
            'as'=>'daily.sale'
        ]);
        Route::get('/sale/daily/all',[
            'uses'=>'AdminController@getDailySaleAll',
            'as'=>'daily.sale.all'
        ]);
        Route::get('/sale/daily/one/{shop_id}',[
            'uses'=>'AdminController@getDailySaleOne',
            'as'=>'daily.sale.one'
        ]);


        Route::get('/item/daily',[
            'uses'=>'AdminController@getDailyItem',
            'as'=>'daily.item'
        ]);

        Route::get('/item/daily/all',[
            'uses'=>'AdminController@getDailyAllItem',
            'as'=>'daily.item.all'
        ]);
        Route::get('/item/daily/one/{shop_id}',[
            'uses'=>'AdminController@getDailyAllItemOne',
            'as'=>'daily.item.one'
        ]);

        Route::get('/product/item/home',[
            'uses'=>'AdminController@getProductHome',
            'as'=>'product.item.home'
        ]);

        Route::get('/product/item/all',[
            'uses'=>'AdminController@getAllProduct',
            'as'=>'product.item.all'
        ]);
        Route::get('/product/item/one/{shop_id}',[
            'uses'=>'AdminController@getOneProduct',
            'as'=>'product.item.one'
        ]);

        Route::get('/shop/all',[
            'uses'=>'AdminController@getAllShop',
            'as'=>'shop.all'
        ]);
        Route::post('/shop/add',[
            'uses'=>'AdminController@postShopAdd',
            'as'=>'shop.add'
        ]);

        Route::get('/income/home',[
            'uses'=>'AdminController@getIncomeHome',
            'as'=>'income.home'
        ]);
        Route::get('/income/all',[
            'uses'=>'AdminController@getIncomeAll',
            'as'=>'income.all'
        ]);
        Route::get('/income/one/{shop_id}',[
            'uses'=>'AdminController@getIncomeOne',
            'as'=>'income.one'
        ]);
        Route::get('/API/income/all',[
            'uses'=>'AdminController@postDashboardReportAll'
        ]);
        Route::get('/API/income/{shop_id}',[
            'uses'=>'AdminController@getAPIIncomeOne'
        ]);

    });
/////////////////////////////////////////////////



    Route::get('/API/image/get',[
        'uses'=>'AdminController@getAPICatImage',
    ]);

    Route::get('/image/get/{img_name}',[
        'uses'=>'AdminController@getCatImage',
        'as'=>'category.image'
    ]);
    Route::get('/items/image/get/{img_name}',[
        'uses'=>'AdminController@getItemImage',
        'as'=>'product.image'
    ]);








/////////////////////////////

    ///////////////////////////////////////////
    Route::get('/get/all/items',[
        'uses'=>'ProductController@getApiItem'
    ]);
    Route::get('/get/all/items/add',[
        'uses'=>'ProductController@getApiItemAdd'
    ]);
    Route::get('/get/table/items',[
        'uses'=>'ProductController@getTableItem'
    ]);


    Route::get('/get/vouncher/{voc_no}',[
        'uses'=>'ProductController@getVouncher',
        'as'=>'vouncher.get'
    ]);
});

