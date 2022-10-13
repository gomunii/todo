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

//



// kaisyaitiran
Route::get('/companies', 'CompanyController@kuboSample')->name("companies.index");
// kaisyahensyuu
Route::get('/company/{id}/edit', 'CompanyController@sampleEdit')->name("companies.edit");
// kaisya hensyuu Save
Route::post('/company/save', 'CompanyController@sampleEditSave')->name("companies.editForm");
// sinkituika
Route::get('/company/create', 'CompanyController@sampleCreate')->name("companies.create");

Route::post('/company/create/save', 'CompanyController@samplecreateSave')->name("companies.createForm");

Route::post('/company/{id}/delete', 'CompanyController@sampleDelete')->name("companies.delete");

Route::get('/employees', 'EmployeeController@employeeindex')->name("employees.index");

Route::get('/employee/{id}/edit', 'EmployeeController@employeeEdit')->name("employees.edit");
// kaisya hensyuu Save
Route::post('/employee/save', 'EmployeeController@employeeEditSave')->name("employees.editForm");
// sinkituika
Route::get('/employee/create', 'EmployeeController@employeeCreate')->name("employees.create");

Route::post('/employee/create/save', 'EmployeeController@employeecreateSave')->name("employees.createForm");

Route::post('/employee/{id}/delete', 'EmployeeController@employeeDelete')->name("employees.delete");







Route::get('/profile/create', 'ProfileController@profileCreate')->name("profiles.create");

Route::post('/profile/create/save', 'ProfileController@profilecreateSave')->name("profiles.createForm");

Route::get('/profiles', 'ProfileController@profileindex')->name("profiles.index");

Route::get('/profile/{id}/edit', 'ProfileController@profileEdit')->name("profiles.edit");

Route::post('/profile/save', 'ProfileController@profileEditSave')->name("profiles.editForm");

Route::post('/profile/{id}/delete', 'ProfileController@profileDelete')->name("profiles.delete");

Route::post('/product/{id}/choice', 'ProductController@productchoice')->name("products.choice");

Route::post('/product/{id}/display', 'ProductController@productdisplay')->name("products.display");

Route::get('/product/create', 'ProductController@productCreate')->name("products.create");

Route::post('/product/create/save', 'ProductController@productcreateSave')->name("products.createForm");

// Route::get('/product/{id}/edit', 'ProductController@prodctEdit')->name("products.edit");

Route::post('/product/save', 'ProductController@productEditSave')->name("products.editForm");

Route::post('/product/{id}/delete', 'ProductController@productDelete')->name("products.delete");

Route::get('/product/shop', 'ProductController@productshop')->name("products.shop");

Route::post('/product/{id}/change', 'ProductController@productChange')->name("products.change");

Route::get('/products/{id}', 'ProductController@productindex')->name("products.index");







// ログイン画面
// 顧客情報（住所等）
// 商品選択
// 確認
// 注文履歴、注文中商品表示
