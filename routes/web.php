<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index' );

Auth::routes();


Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-view', 'HomeController@adminView')->name('admin.view');

    //================= ROUTE ROLE ========================================//
    
    Route::get('/admin/role','AdminController@role_list');
    Route::post('/add_role', 'AdminController@add_role');
    
    Route::get('/destroy_role/{id}', 'AdminController@delete_role');
    Route::put('/update_role/{id}', 'AdminController@update_role');

     //================= ROUTE CATEGORIE ========================================//
    
     Route::get('/admin/categorie','AdminController@categorie_list');
     Route::post('/add_categorie', 'AdminController@add_categorie');
     
     Route::get('/destroy_categorie/{id}', 'AdminController@delete_categorie');
     Route::put('/update_categorie/{id}', 'AdminController@update_categorie');

    //================= ROUTE collection ========================================//
    
    Route::get('/admin/collection','AdminController@collection_list');
    Route::post('/add_collection', 'AdminController@add_collection');
    
    Route::get('/destroy_collection/{id}', 'AdminController@delete_collection');
    Route::put('/update_collection/{id}', 'AdminController@update_collection');
        
      //================= ROUTE collection ========================================//
    
      Route::get('/admin/users','AdminController@users_list');
      Route::post('/add_users', 'AdminController@add_users');
      
      Route::get('/destroy_users/{id}', 'AdminController@delete_users');
      Route::put('/update_users/{id}', 'AdminController@update_users');

       //================= ROUTE Livres ========================================//
    
       Route::get('/admin/livres','AdminController@livre_list');
       Route::get('/admin/livres/add', 'AdminController@livre_add');
       Route::post('/add_livre', 'AdminController@add_livre');
       
       Route::get('/destroy_livre/{id}', 'AdminController@delete_livre');
       Route::put('/update_livre/{id}', 'AdminController@update_livre');
});
Route::get('/all_livre', 'AdminController@all_livre');
Route::get('/all_users', 'AdminController@all_users');
Route::get('/all_collection', 'AdminController@all_collection');
Route::get('/all_categorie', 'AdminController@all_categorie');
Route::get('/all_role', 'AdminController@all_role');

Route::get('/list_livre','LivresController@all_livre');