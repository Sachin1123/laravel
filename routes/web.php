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
<<<<<<< Updated upstream
    return view('welcome');
});
=======

//     $event = new Event;
// //  dd($event);
//     $event->name='pay for check ';
//     $event->startDateTime = Carbon\Carbon::now();
//     $event->endDateTime = Carbon\Carbon::now()->addHour();
//     $event->save();
//     $e=Event::get();
//     // dd($e);
//     $userEvent = Event::get();
//     // dd($userEvent );
     return view('welcome');
});

Auth::routes();
Route::get('logout', function ()
{
   
        Auth::logout();
        return redirect('/');
    
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/event', [App\Http\Controllers\EventController::class, 'event'])->name('event');
Route::get('fullcalender', [EventController::class, 'index'])->name('fullcalender');
;

Route::post('fullcalenderAjax', [EventController::class, 'ajax']);

>>>>>>> Stashed changes
