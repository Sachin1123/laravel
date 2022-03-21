<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use App\Models\Events;
use App\Http\Requests\User\CreateEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Auth;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Validator;
use Carbon\CarbonInterface;
use DateTime;
use Calendar;
use Carbon\Carbon;

class EventController extends Controller
{
    //



    public function event(Request $request ){
      
      
            $event = new Events;
        
            $event->name=$request->input('name');

            $event->startDateTime = $request->input('start_date');
            
            $event->endDateTime =$request->input('end_date');
         
             // dd($event); 
            $event->save();
            $e=Events::get();
            // dd($e); 
           
      
            $startTime=Carbon::parse($request->input('start_date').' '.$request->input('start_time'));
          
            $endTime=(clone $startTime)->addHours();
            Events::create([
            'name'=>$request->input('name'),
            'start_date'=>$request->input('start_date'),
            'description'=>$request->input('description'),
            'start_time'=>$request->input('start_time'),
            'end_time'=>$request->input('end_time'),
            
            'end_date'=>$request->input('end_date'),
            ]);
            return redirect()->back()->withMessage('Event Booked');

    } 



}
  





