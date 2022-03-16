<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Http\Requests\User\CreateEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Auth;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    //


    public function getEvent(){
        return new EventResource(Event::all());
    }

    public function getEventId($id){
        $event = event::find($id);
        return new EventResource($event);
   
    }


    public function createEvent(CreateEventRequest $request){
        
        $data= $request->all();
        $userEvent = Event::create($data);
        return new EventResource($data);
                  
    } 


public function store(StoreEventRequest $request)
{
    Event::create($request->all());
    return redirect()->route('admin.systemCalendar');
}

public function update(UpdateEventRequest $request, Event $event)
{
    $event->update($request->all());
    return redirect()->route('admin.systemCalendar');
}
      

public function boot()
{
    Event::observe(RecurrenceObserver::class);
}


}
