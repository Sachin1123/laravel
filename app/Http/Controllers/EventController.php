<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
<<<<<<< HEAD

use Illuminate\Http\Request;
=======
use \Debugbar;
>>>>>>> public
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
<<<<<<< HEAD

class EventController extends Controller
{
    //



    public function event(Request $request ){
      
      
            $event = new Event;
        
            $event->name=$request->input('name');

            $event->startDateTime = $request->input('start_date') ?? Carbon\Carbon::now();
            
            $event->endDateTime =$request->input('end_date') ?? Carbon\Carbon::now()->addHour();
         
             // dd($event); 
            $event->save();
            $e=Event::get();
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



=======
use Illuminate\Http\Request;
use Redirect,Response;
class EventController extends Controller
{


    public function index(Request $request)
    {
 
        $data = Events::all(); 
        // echo'<pre>'; print_r($event); die;     
        {      
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');   
            $data = Events::whereDate('start_date', '>=', $start)->whereDate('end_date',   '<=', $end)->get(['id','description','start_date', 'end_date']);
            return response()->json($data);
        } 

        return view('home');
       
    }

  
    public function ajax(Request $request)
    {
  
        switch ($request->type) {
           case 'add':
              $event = Events::create([
                'users_id'=>Auth::user()->id,
                  'description' => $request->description,
                  'start_date' => $request->start_date,
                  'end_date' => $request->end_date,
              ]);
          
              return response()->json($event);
             break;
  
           case 'update':
              $event = Events::find($request->id)->update([
                'users_id'=>$request->users_id,
                  'description' => $request->description,
                  'start_date' => $request->start_date,
                  'end_date' => $request->end_date,
              ]);
     
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Events::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
    
>>>>>>> public
}
  





