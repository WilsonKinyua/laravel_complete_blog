<?php
use App\Http\Controllers\PostsController;
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

Route::get('/', 'WelcomeController@index')->name("welcome");

Route::get("single-post/{post}","WelcomeController@show")->name("blog.show");

Route::get("categories/category/{category}","WelcomeController@category")->name("blog.category");

Route::get("tags/tag/{tag}","WelcomeController@tag")->name("blog.tag");


Auth::routes();
// Auth::routes(['verify' => true]);



Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('posts', 'PostsController');
    
    Route::get("trashed-posts","PostsController@trashed")->name("trashed-posts");
    
    Route::put("restore-posts/{post}","PostsController@restore")->name("restore-posts");
    
    Route::resource('categories', 'CategoriesController');
    
    Route::resource('tags', 'TagsController');

    Route::delete("user/destroy-account","UsersController@destroyAccount")->name("user.destroy-account");

    Route::get("user/edit-profile","UsersController@editProfile")->name("user.edit-profile");

    Route::resource("update-profile","UpdateProfileController");

    Route::patch("/user/update-password/{user}","UpdateProfileController@updatePassword")->name("user.update-password");

    Route::resource('todos', 'TodosController');

    Route::resource('comments', 'CommentsController');

});


Route::group(['middleware' => ['admin','auth']], function () {
    
    Route::resource('users', 'UsersController');

    Route::post("users/make-admin/{user}","UsersController@makeAdmin")->name("user.make-admin");
    
    Route::get("user/update-profile","UsersController@updateProfile")->name("user.update-profile");

    Route::get("user/trashed-accounts","UsersController@trashedAccounts")->name("user.trashed-accounts");


});


