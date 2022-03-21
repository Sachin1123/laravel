<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Http\Requests\User\CreateEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Auth;
use Illuminate\Support\Facades\Validator;


use Calendar;
use Carbon\Carbon;

class EventController extends Controller
{
    //



    public function event(Request $request){
      
        // $events = [];
        // $data = Event::get();
        // echo'<pre>';  print_r($data); die; 
        // $event->startDateTime = Carbon\Carbon::now();
            $startTime=Carbon::parse($request->input('start_date').' '.$request->input('start_time'));
            $endTime=(clone $startTime)->addHours();
            Event::create([
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
  





