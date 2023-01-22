<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/search-tags', function (){
    return view('tags_search');
});

// Route::get('/search-tags/{kategori}', function ($kategori){
//     return view('tags_search')->with('kategori',$kategori);
// });

Route::get('/book-details/{id}', function($id) {
    return view('book_details')->with('id', $id);
});

Route::get('/about', function() {
    return view('about');
});

Route::prefix('admin')->group(function () {

    Route::get('/login', function(){
        return view('admin/login');
    });
   Route::get('/', function(){
        return view('admin/book');
   });

   Route::get('/add', function(){
        return view('admin/add-book');
   });

   Route::get('/edit/{id}', function($id){
    return view('admin/edit-book')->with('id', $id);
    });

    // user
    Route::prefix('/users')->group(function(){
        Route::get('/', function(){
            return view('admin/user');
        });

        Route::get('/add', function(){
            return view('admin/add-user');
        });

        Route::get('/edit/{id}', function($id){
            return view('admin/edit-user')->with('id', $id);
        });
    });

    Route::get('/logs', function(){
        return view('admin/logs');
    });

});

// buat kalo ada sesi admin
// Route::prefix('admin')->middleware(['check_user'])->group(function () {
    
// });

