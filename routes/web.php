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

View::composer('partitials.header', function($view){
    $view->with('menu', DB::table('menu')->where('status', 1)->orderBy('sort', 'asc')->get());
});
View::composer('admin.partitials.menu', function($view){
    $view->with('menu', DB::table('menu')->where('status', 1)->orderBy('sort', 'asc')->get());
});

View::composer('layout', function($view){
    $view->with('contact', DB::table('contact')->first());
});

View::composer('partitials.footer_contact', function($view){
    $view->with('contact', DB::table('contact')->first());
});

Route::get('/', ['as' => 'template.home', 'uses' => 'HomeController@index']);

Route::get('/stranka-nenalezena', ['as' => '404', 'uses' => 'HomeController@error']);

Route::post('/addMeeting', ['as' => 'contact.addMeeting', 'uses' => 'HomeController@addMeeting']);

Route::get('/proc-se-mnou', ['as' => 'template.about', 'uses' => 'AboutController@index']);

Route::get('/produkty', ['as' => 'categories.list', 'uses' => 'CategoryController@index']);
Route::get('/produkty/{href}', ['as' => 'categories.detail', 'uses' => 'CategoryController@show']);

Route::get('/reference', ['as' => 'reference.list', 'uses' => 'ReferenceController@index']);
Route::post('/reference/addComment', ['as' => 'reference.addComment', 'uses' => 'ReferenceController@store']);

Route::get('/blog', ['as' => 'blog.list', 'uses' => 'BlogController@index']);
Route::get('/blog/article/{href}', ['as' => 'blog.detail', 'uses' => 'BlogController@show']);

Route::get('/kontakt', ['as' => 'template.contact', 'uses' => 'ContactController@index']);
Route::post('/kontakt/sendMessage', ['as' => 'contact.sendMessage', 'uses' => 'ContactController@store']);


Route::group(['prefix' => 'dotaznik'], function () {
    Route::get('', ['as' => 'form.index', 'uses' => 'FormController@index']);
    Route::post('store', ['as' => 'form.store', 'uses' => 'FormController@store']);
});





Auth::routes();

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@index']);




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {


    Route::get('reset', ['as' => 'admin.reset', 'uses' => 'admin\AdminController@password']);
    Route::post('{id}/reset-password', ['as' => 'admin.resetPassword', 'uses' => 'admin\AdminController@reset']);



    Route::get('', ['as' => 'admin.template.home', 'uses' => 'admin\AdminController@index']);


    Route::group(['prefix' => 'proc-se-mnou'], function () {
        Route::get('', ['as' => 'admin.about.list', 'uses' => 'AboutController@indexAdmin']);
        Route::post('update', ['as' => 'admin.about.update', 'uses' => 'AboutController@update']);
    });

    Route::group(['prefix' => 'partneri'], function () {
        Route::get('', ['as' => 'admin.partners.list', 'uses' => 'AboutController@indexAdminPartners']);
        Route::post('store', ['as' => 'admin.partners.store', 'uses' => 'AboutController@store']);
        Route::get('{id}/delete', ['as' => 'admin.partners.delete', 'uses' => 'AboutController@destroy']);
    });

    Route::group(['prefix' => 'produkty'], function () {
        Route::get('', ['as' => 'admin.categories.list', 'uses' => 'CategoryController@indexAdmin']);
        Route::get('{id}/edit', ['as' => 'admin.categories.edit', 'uses' => 'CategoryController@edit']);
        Route::post('{id}/update', ['as' => 'admin.categories.update', 'uses' => 'CategoryController@update']);
        Route::get('{id}/delete', ['as' => 'admin.categories.delete', 'uses' => 'CategoryController@destroy']);
        Route::get('create', ['as' => 'admin.categories.create', 'uses' => 'CategoryController@create']);
        Route::post('store', ['as' => 'admin.categories.store', 'uses' => 'CategoryController@store']);
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('', ['as' => 'admin.blog.list', 'uses' => 'BlogController@indexAdmin']);
        Route::get('{id}/edit', ['as' => 'admin.blog.edit', 'uses' => 'BlogController@edit']);
        Route::post('{id}/update', ['as' => 'admin.blog.update', 'uses' => 'BlogController@update']);
        Route::get('{id}/delete', ['as' => 'admin.blog.delete', 'uses' => 'BlogController@destroy']);
        Route::get('create', ['as' => 'admin.blog.create', 'uses' => 'BlogController@create']);
        Route::post('store', ['as' => 'admin.blog.store', 'uses' => 'BlogController@store']);
    });

    Route::group(['prefix' => 'reference'], function () {
        Route::get('', ['as' => 'admin.reference.list', 'uses' => 'ReferenceController@indexAdmin']);
        Route::get('/{id}/edit', ['as' => 'admin.reference.edit', 'uses' => 'ReferenceController@edit']);
        Route::post('{id}/update', ['as' => 'admin.reference.update', 'uses' => 'ReferenceController@update']);
        Route::get('{id}/delete', ['as' => 'admin.reference.delete', 'uses' => 'ReferenceController@destroy']);
    });

    Route::group(['prefix' => 'kontakt'], function () {
        Route::get('', ['as' => 'admin.contact.list', 'uses' => 'ContactController@indexAdmin']);
        Route::post('update', ['as' => 'admin.contact.update', 'uses' => 'ContactController@update']);
    });

    Route::group(['prefix' => 'banner'], function () {
        Route::get('', ['as' => 'admin.banner.list', 'uses' => 'BannerController@indexAdmin']);
        Route::get('{id}/edit', ['as' => 'admin.banner.edit', 'uses' => 'BannerController@edit']);
        Route::post('{id}/update', ['as' => 'admin.banner.update', 'uses' => 'BannerController@update']);
        Route::get('{id}/delete', ['as' => 'admin.banner.delete', 'uses' => 'BannerController@destroy']);
        Route::get('create', ['as' => 'admin.banner.create', 'uses' => 'BannerController@create']);
        Route::post('store', ['as' => 'admin.banner.store', 'uses' => 'BannerController@store']);
    });

    Route::group(['prefix' => 'menu'], function () {
        Route::get('', ['as' => 'admin.menu.list', 'uses' => 'admin\MenuController@index']);
        Route::get('create', ['as' => 'admin.menu.create', 'uses' => 'admin\MenuController@create']);
        Route::post('store', ['as' => 'admin.menu.store', 'uses' => 'admin\MenuController@store']);
        Route::post('{id}/update', ['as' => 'admin.menu.update', 'uses' => 'admin\MenuController@update']);
        Route::get('{id}/hide', ['as' => 'admin.menu.hide', 'uses' => 'admin\MenuController@hide']);
        Route::get('{id}/show', ['as' => 'admin.menu.show', 'uses' => 'admin\MenuController@show']);
        Route::get('{id}/delete', ['as' => 'admin.menu.delete', 'uses' => 'admin\MenuController@delete']);
    });




    Route::group(['prefix' => 'forms'], function () {
        Route::get('', ['as' => 'admin.form.list', 'uses' => 'admin\FormController@index']);
        Route::get('{id}/detail', ['as' => 'admin.form.detail', 'uses' => 'admin\FormController@detail']);
    });


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