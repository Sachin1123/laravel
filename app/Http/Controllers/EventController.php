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


class EventController extends Controller
{
    //



    public function event(Request $request){
      
        $data= $request->all();
        
        $userEvent = Event::create($data);
        // echo "<pre>"; print_r($userEvent); die;
        // return new EventResource($data);
                  
    } 






}
