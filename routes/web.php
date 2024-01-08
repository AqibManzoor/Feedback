<?php

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SoftDeletesController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\ThemesManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'App\Http\Controllers\WelcomeController@welcome')->name('welcome');
});

// Authentication Routes
Auth::routes();
// $this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {
    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'App\Http\Controllers\Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'App\Http\Controllers\Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'App\Http\Controllers\Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'App\Http\Controllers\Auth\ActivateController@exceeded']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'App\Http\Controllers\RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {
    // Activation Routes
    Route::get('/activation-required', ['uses' => 'App\Http\Controllers\Auth\ActivateController@activationRequired'])->name('activation-required');
    // Route::get('/logout', ['uses' => 'App\Http\Controllers\Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {
    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', [
        'as'   => 'public.home',
        'uses' => 'App\Http\Controllers\UserController@index',
        'name' => 'home',
    ]);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'App\Http\Controllers\ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {
    // User Profile and Account Routes
    Route::resource(
        'profile',
        \App\Http\Controllers\ProfilesController::class,
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => 'profile.updateUserAccount',
        'uses' => 'App\Http\Controllers\ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => 'profile.updateUserPassword',
        'uses' => 'App\Http\Controllers\ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => 'profile.deleteUserAccount',
        'uses' => 'App\Http\Controllers\ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'App\Http\Controllers\ProfilesController@userProfileAvatar',
    ]);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', \App\Http\Controllers\SoftDeletesController::class, [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', \App\Http\Controllers\UsersManagementController::class, [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'App\Http\Controllers\UsersManagementController@search')->name('search-users');

    Route::resource('themes', \App\Http\Controllers\ThemesManagementController::class, [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'App\Http\Controllers\AdminDetailsController@listRoutes');
    // Route::get('active-users', 'App\Http\Controllers\AdminDetailsController@activeUsers');
    Route::get('admin/feedback', 'App\Http\Controllers\FeedbackController@index')->name('feedback.index');
    Route::get('admin/feedback/show/{id}', 'App\Http\Controllers\FeedbackController@show')->name('feedback.show');

});
Route::get('/social/redirect', 'SocialController@redirect')->name('social.redirect');



// Feedbacke
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked'], 'prefix' => 'feedback'], function () {

    Route::get('/', 'App\Http\Controllers\FeedbackController@index')->name('feedback.index');
    Route::get('/create', 'App\Http\Controllers\FeedbackController@create')->name('feedback.create');
    Route::post('/', 'App\Http\Controllers\FeedbackController@store')->name('feedback.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\FeedbackController@edit')->name('feedback.edit');
    Route::put('/{id}', 'App\Http\Controllers\FeedbackController@update')->name('feedback.update');
    Route::delete('/{id}', 'App\Http\Controllers\FeedbackController@destroy')->name('feedback.destroy');
    Route::post('/search', 'App\Http\Controllers\FeedbackController@search')->name('feedback.search');
    Route::get('/{id}/feedbackdetail', 'App\Http\Controllers\FeedbackController@feedbackdetail')->name('feedback.feedbackdetail');
});

//Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked'],'prefix'=>'profile'], function () {

  Route::get('my-feedback', 'App\Http\Controllers\FeedbackController@my_feedback')->name('my.feedback');
  Route::post('/feedback/{id}/upvote', 'App\Http\Controllers\VoteController@upvote');
  // Route::post('/comment/{commentId}/downvote', 'VoteController@downvote');
//});
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked'], 'prefix' => 'comment'], function () {


    Route::get('/', 'App\Http\Controllers\CommentController@comment')->name('comment.index');
    Route::post('/comment', 'App\Http\Controllers\CommentController@store')->name('comment.store'); // Updated to 'comment.store'
    Route::get('/create', 'App\Http\Controllers\CommentController@create')->name('comment.create');
    Route::get('/edit/{id}', 'App\Http\Controllers\CommentController@edit')->name('comment.edit');
    Route::get('/comments/search','App\Http\Controllers\CommentController@search')->name('comment.search');
    Route::put('/update/{id}', 'App\Http\Controllers\CommentController@update')->name('comment.update');
    Route::delete('/delete/{id}', 'App\Http\Controllers\CommentController@destroy')->name('comment.destroy');

});
Route::get('/feedbacks/{id}/detail', 'App\Http\Controllers\FeedbackController@detail')->name('feedback.detail');









