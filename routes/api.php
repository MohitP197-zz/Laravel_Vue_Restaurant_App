<?php

use App\MenuItem;
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

Route::post('/categories/upsert', 'Admin\Categories\CategoriesController@upsert');

// Using route model binding by passing category which automatically looks up that category and pass it to the controller method
Route::delete('/categories/{category}', 'Admin\Categories\CategoriesController@destroy');

Route::post('/menu-items/add', 'Admin\MenuItems\MenuItemsController@store');

Route::get('/menu-items/{menuItem}', function (MenuItem $menuItem) {
    return $menuItem;
});

Route::post('/menu-items/{menuItem}', 'Admin\MenuItems\MenuItemsController@update');

Route::post('/add-image', function (Request $request) {
    $file = $request->file('file');
    $dir = 'images/MenuItems';
    $path = $file->move($dir);
    return str_replace("$dir/", '', $path);
});

Route::get('/categories/{category}/items', 'Admin\Categories\CategoriesController@items');
