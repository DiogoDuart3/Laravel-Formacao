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

use App\models\Post;
use App\models\Role;
use App\models\User;
use App\Photo;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
})->middleware('age');

Route::get('/admin/user/{id}/pen', function($id){
    $user = User::findOrFail($id);
    dd($user->pen);
});

Route::get('/admin/user/{id}/posts', function($id){
    $user = User::findOrFail($id);
    dd($user->posts);
});

Route::get('/admin/user/{id}/roles', function($id){
    $user = User::findOrFail($id);
    foreach($user->roles as $role){
        echo $role . '<br>';
    }
});

Route::get('/admin/user/{id}/photos', function($id){
    $user = User::findOrFail($id);
    foreach ($user->photos as $photo){
        echo $photo->path . '<br>';
    }
});

Route::resource('/admin/posts', 'PostController');

Route::get('/admin/post/{post}/photos', function($post){
    $post = Post::findOrFail($post);
    foreach ($post->photos as $photo){
        echo $photo->path . '<br>';
    }
});

Route::get('/admin/roles/{id}/users', function($id){
    $role = Role::findOrFail($id);
    foreach($role->users as $user){
        echo $user->name . '<br>';
    }
});

Route::get('/admin/roles/set/{user}/{role}', function ($user, $role){
    $role = Role::where('name', 'Super User')->first()->id;
    $user = App\User::findOrFail($user);
    $user->roles()->attach($role);
});

Route::get('/admin/photos/{id}/user', function($id){
    $photo = Photo::findOrFail($id);
    echo $photo->imageable;
});