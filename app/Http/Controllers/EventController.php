<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use \Debugbar;
use App\Http\Resources\EventResource;
use App\Models\Events;
use Auth;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Validator;
use Carbon\CarbonInterface;
use DateTime;
use Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect,Response;
class EventController extends Controller
{

    public function index(Request $request)
    {  
      if($request->ajax()) {      
      $data = Events::with('users')->whereDate('start', '>=', $request->start)  
      ->whereDate('end', '<=', $request->end)                  
      ->get();
      // print_r($data); die;                
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
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,              
          ]);
          $data=Events::with('users')->find($event->id);
              return response()->json($data);
             break;
  
           case 'update':
              $event = Events::find($request->id)->update([
                'users_id'=>$request->users_id,
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
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
    

}
  





