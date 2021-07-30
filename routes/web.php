<?php

use App\Http\Controllers\BroadcastMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagicLinkController;
use App\Http\Controllers\PassPhraseController;
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
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::post('/check-email', [\App\Actions\Fortify\AuthenticateLoginAttempt::class, 'checkEmail'])->name('check-email');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/exprimer', [HomeController::class, 'exprimer'])->name('dashboard.exprimer');
    Route::view('/settings', 'settings')->name('dashboard.settings');
    Route::post('/exprimer/send', [BroadcastMessageController::class, 'insertRecord'])->name('dashboard.exprimer.add');

    Route::resource('change-password', \App\Http\Controllers\PasswordController::class);
    Route::view('/preferences', 'preferences')->name('dashboard.settings.preferences');
});


Route::get('/login/confirm',[PassPhraseController::class,'show'])->name('login.confirm');
Route::post('/login/confirm',[PassPhraseController::class,'store'])->name('login.confirmation');
Route::get('/login/magic/{user}',[MagicLinkController::class,'confirm'])->name('login.magiclink');


Route::get('testMessage',\App\Http\Controllers\ScheduledMessage::class);
