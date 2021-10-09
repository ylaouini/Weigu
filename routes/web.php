<?php

use App\Http\Controllers\BroadcastMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagicLinkController;
use App\Http\Controllers\PassPhraseController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return redirect('/exprimer');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

// Twitter log in
Route::get('/auth/redirect', function () {
    return Socialite::driver('twitter')->redirect();
})->name('login.twitter');

Route::get('auth/callback/twitter', function () {
    $user = Socialite::driver('twitter')->user();

    // $user->token
});

Route::post('/check-email', [\App\Actions\Fortify\AuthenticateLoginAttempt::class, 'checkEmail'])->name('check-email');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {


    Route::view('/profile','profile');

    Route::get('/exprimer', [HomeController::class, 'exprimer'])->name('dashboard.exprimer');
//    Route::view('/settings', 'settings')->name('dashboard.settings');
    Route::get('/settings',[\App\Http\Controllers\SettingsController::class,'index'])->name('dashboard.settings');
    Route::get('/settingsChangeMessage',[\App\Http\Controllers\SettingsController::class,'changeStatusNotifictionMessage']);
    Route::get('/settingsChangeQuestion',[\App\Http\Controllers\SettingsController::class,'changeStatusNotifictionQuestion']);
    Route::post('/exprimer/send', [BroadcastMessageController::class, 'insertRecord'])->name('dashboard.exprimer.add');

    Route::get('/questions',[\App\Http\Controllers\NewsQuestion::class,'index'])->name('newsQuestion');
    Route::get('/send-question/{question}',[\App\Http\Controllers\NewsQuestion::class,'sendQuestion'])->name('sendQuestion');
    #Load more Infinite Scroll in Laravel
    Route::get('/load-more-data-example',[\App\Http\Controllers\NewsQuestion::class,'index']);

    Route::resource('change-password', \App\Http\Controllers\PasswordController::class);
    Route::view('/preferences', 'preferences')->name('dashboard.settings.preferences');

    //Chatify

    Route::post('chat/blockUser',[MessagesController::class,'blockUser'])->name('block-user');
    Route::post('chat/reportUser',[MessagesController::class,'reportUser'])->name('report-user');
    Route::post('chat/unreadMessage',[MessagesController::class,'unreadMessageForUser']);
    // delete Message
    Route::post('chat/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('messages.delete');


    Route::view('/privacy', 'privacy');
    Route::view('/terms-and-conditions', 'terms-conditions');
});


Route::get('/login/confirm',[PassPhraseController::class,'show'])->name('login.confirm');
Route::post('/login/confirm',[PassPhraseController::class,'store'])->name('login.confirmation');
Route::get('/login/magic/{user}',[MagicLinkController::class,'confirm'])->name('login.magiclink');

Route::view('/about', 'about');
Route::view('/algorithme', 'algorithme');
Route::view('/informations', 'informations')->name('informations');
Route::view('/more-information', 'moreInfo');

Route::get('/delete-user',[\App\Http\Controllers\UserController::class,'delete'])->name('delete.user');
Route::get('/notification', function () {
    $user = \App\Models\User::find(280);
    $message = \App\Models\BroadcastMessage::find(1);

    return (new \App\Notifications\WelcomeNotification($user))
        ->toMail($user);
});

Route::get('/welcome',\App\Http\Controllers\SendWelcomeMail::class);
Route::get('/autologin/{user}',[MagicLinkController::class,'loginTest'])->name('autologin');
