<?php
use Spatie\GoogleCalendar\Event;

use App\Http\Controllers\EventController;
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

    $event = new Event;
//  dd($event);
    $event->name='pay for check ';
    $event->startDateTime = Carbon\Carbon::now();
    $event->endDateTime = Carbon\Carbon::now()->addHour();
    $event->save();
    $e=Event::get();
    // dd($e);
    $userEvent = Event::get();
    // dd($userEvent );
     return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/event', [App\Http\Controllers\EventController::class, 'event'])->name('event');
