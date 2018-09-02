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


Auth::routes();

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@index']);




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('reset', ['as' => 'admin.reset', 'uses' => 'Admin\AdminController@password']);
        Route::post('{id}/reset-password', ['as' => 'admin.resetPassword', 'uses' => 'Admin\AdminController@reset']);
    });



    Route::get('', ['as' => 'admin.template.home', 'uses' => 'Admin\AdminController@index']);

    Route::group(['prefix' => 'pages'], function () {
        Route::get('', ['as' => 'admin.pages.index', 'uses' => 'Admin\PagesController@index']);
        Route::get('{id}/edit', ['as' => 'admin.pages.edit', 'uses' => 'Admin\PagesController@edit']);
        Route::post('{id}/update', ['as' => 'admin.pages.update', 'uses' => 'Admin\PagesController@update']);
        Route::get('{id}/delete', ['as' => 'admin.pages.delete', 'uses' => 'Admin\PagesController@destroy']);
        Route::get('create', ['as' => 'admin.pages.create', 'uses' => 'Admin\PagesController@create']);
        Route::post('store', ['as' => 'admin.pages.store', 'uses' => 'Admin\PagesController@store']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', ['as' => 'admin.products.index', 'uses' => 'Admin\ProductsController@index']);
        Route::get('{id}/edit', ['as' => 'admin.products.edit', 'uses' => 'Admin\ProductsController@edit']);
        Route::post('{id}/update', ['as' => 'admin.products.update', 'uses' => 'Admin\ProductsController@update']);
        Route::get('{id}/delete', ['as' => 'admin.products.delete', 'uses' => 'Admin\ProductsController@destroy']);
        Route::get('create', ['as' => 'admin.products.create', 'uses' => 'Admin\ProductsController@create']);
        Route::post('store', ['as' => 'admin.products.store', 'uses' => 'Admin\ProductsController@store']);
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('', ['as' => 'admin.blog.index', 'uses' => 'Admin\BlogController@indexAdmin']);
        Route::get('{id}/edit', ['as' => 'admin.blog.edit', 'uses' => 'Admin\BlogController@edit']);
        Route::post('{id}/update', ['as' => 'admin.blog.update', 'uses' => 'Admin\BlogController@update']);
        Route::get('{id}/delete', ['as' => 'admin.blog.delete', 'uses' => 'Admin\BlogController@destroy']);
        Route::get('create', ['as' => 'admin.blog.create', 'uses' => 'Admin\BlogController@create']);
        Route::post('store', ['as' => 'admin.blog.store', 'uses' => 'Admin\BlogController@store']);
    });

    Route::group(['prefix' => 'reference'], function () {
        Route::get('', ['as' => 'admin.reference.index', 'uses' => 'Admin\ReferenceController@indexAdmin']);
        Route::get('/{id}/edit', ['as' => 'admin.reference.edit', 'uses' => 'Admin\ReferenceController@edit']);
        Route::post('{id}/update', ['as' => 'admin.reference.update', 'uses' => 'Admin\ReferenceController@update']);
        Route::get('{id}/delete', ['as' => 'admin.reference.delete', 'uses' => 'Admin\ReferenceController@destroy']);
    });


    Route::group(['prefix' => 'banner'], function () {
        Route::get('', ['as' => 'admin.banner.index', 'uses' => 'Admin\BannerController@indexAdmin']);
        Route::get('{id}/edit', ['as' => 'admin.banner.edit', 'uses' => 'Admin\BannerController@edit']);
        Route::post('{id}/update', ['as' => 'admin.banner.update', 'uses' => 'Admin\BannerController@update']);
        Route::get('{id}/delete', ['as' => 'admin.banner.delete', 'uses' => 'Admin\BannerController@destroy']);
        Route::get('create', ['as' => 'admin.banner.create', 'uses' => 'Admin\BannerController@create']);
        Route::post('store', ['as' => 'admin.banner.store', 'uses' => 'Admin\BannerController@store']);
    });

    Route::group(['prefix' => 'menu'], function () {
        Route::get('', ['as' => 'admin.menu.index', 'uses' => 'Admin\MenuController@index']);
        Route::get('create', ['as' => 'admin.menu.create', 'uses' => 'Admin\MenuController@create']);
        Route::post('store', ['as' => 'admin.menu.store', 'uses' => 'Admin\MenuController@store']);
        Route::post('{id}/update', ['as' => 'admin.menu.update', 'uses' => 'Admin\MenuController@update']);
        Route::get('{id}/hide', ['as' => 'admin.menu.hide', 'uses' => 'Admin\MenuController@hide']);
        Route::get('{id}/show', ['as' => 'admin.menu.show', 'uses' => 'Admin\MenuController@show']);
        Route::get('{id}/delete', ['as' => 'admin.menu.delete', 'uses' => 'Admin\MenuController@delete']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('', ['as' => 'admin.users.index', 'uses' => 'Admin\UsersController@index']);
        Route::get('create', ['as' => 'admin.users.create', 'uses' => 'Admin\UsersController@create']);
        Route::get('edit', ['as' => 'admin.users.edit', 'uses' => 'Admin\UsersController@edit']);
        Route::post('store', ['as' => 'admin.users.store', 'uses' => 'Admin\UsersController@store']);
        Route::post('{id}/update', ['as' => 'admin.users.update', 'uses' => 'Admin\UsersController@update']);
        Route::get('{id}/delete', ['as' => 'admin.users.delete', 'uses' => 'Admin\UsersController@delete']);
    });

});




View::composer('partitials.header', function($view){
    $view->with('menu', DB::table('menu')->where('status', 1)->orderBy('sort', 'asc')->get());
});

View::composer('layout', function($view){
    $view->with('contact', DB::table('contact')->first());
});

View::composer('partitials.footer_contact', function($view){
    $view->with('contact', DB::table('contact')->first());
});

Route::group(['prefix' => '/', 'middleware' => 'web'], function () {

    Route::get('', ['as' => 'template.home', 'uses' => 'HomeController@index']);

    Route::get('stranka-nenalezena', ['as' => '404', 'uses' => 'HomeController@error']);

    Route::post('addMeeting', ['as' => 'contact.addMeeting', 'uses' => 'HomeController@addMeeting']);

    Route::get('proc-se-mnou', ['as' => 'template.about', 'uses' => 'AboutController@index']);

    Route::get('produkty', ['as' => 'categories.list', 'uses' => 'CategoryController@index']);
    Route::get('produkty/{href}', ['as' => 'categories.detail', 'uses' => 'CategoryController@show']);

    Route::get('reference', ['as' => 'reference.list', 'uses' => 'ReferenceController@index']);
    Route::post('reference/addComment', ['as' => 'reference.addComment', 'uses' => 'ReferenceController@store']);

    Route::get('blog', ['as' => 'blog.list', 'uses' => 'BlogController@index']);
    Route::get('blog/article/{href}', ['as' => 'blog.detail', 'uses' => 'BlogController@show']);

    Route::get('kontakt', ['as' => 'template.contact', 'uses' => 'ContactController@index']);
    Route::post('kontakt/sendMessage', ['as' => 'contact.sendMessage', 'uses' => 'ContactController@store']);


    Route::group(['prefix' => 'anketa'], function () {
        Route::get('', ['as' => 'form.index', 'uses' => 'FormController@index']);
        Route::post('store', ['as' => 'form.store', 'uses' => 'FormController@store']);
    });

    Route::get('{url}', ['as' => 'pages.index', 'uses' => 'PagesController@index']);


});


/*
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('users', function ()    {
        // Matches The "/admin/users" URL
    });
});

*/