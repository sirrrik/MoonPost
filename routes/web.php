<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\DB;
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
use App\Mail\NewUserWelcomeMail;

Auth::routes();
// use the full qualified name.

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});
Route::get('/Admin/index','App\Http\Controllers\AdminController@index')->name('Admin.index');

 Route::post('/Admin/delete/{id}','App\Http\Controllers\AdminController@delete')->name('delete');

// Route::post('delete/{id}',[AdminController::class, 'delete'])->name('delete');

Route::post('follow/{user}','App\Http\Controllers\FollowersController@store');

Route::get('/', 'App\Http\Controllers\PostsController@index');

Route::get('/p/create','App\Http\Controllers\PostsController@create');

Route::post('/p','App\Http\Controllers\PostsController@store');

Route::get('/p/{post}','App\Http\Controllers\PostsController@show');


Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit','App\Http\Controllers\ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}','App\Http\Controllers\ProfilesController@update')->name('profile.update');



Route::get ( '/welcome', function () {
	return view ( 'welcome' );
} );

Route::post ( '/search', function () {
	$q = Request::Input ( 'q' );
	if($q != ""){
		$user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
		if (count ( $user ) > 0)
			return view ( '/welcome' )->withDetails ( $user )->withQuery ( $q );
		else
			return view ( '/welcome' )->withMessage ( 'No Details found. Try to search again !' );
	}
	return view ( 'search-functionality-in-laravel/welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );

