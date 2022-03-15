<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Http\Requests\User\CreateEventRequest;
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

      
    

}
