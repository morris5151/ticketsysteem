<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function viewEvent()
    {
        return view('event');
    }

    public function createEvents(Request $request){
        $request;
        $newEvent = new Event();
        $newEvent->name = $request->input('name');
        $newEvent->event_start = $request->input('event_start');
        $newEvent->event_end = $request->input('event_end');
        $newEvent->available_tickets = $request->input('available_tickets');
        $newEvent->location = $request->input('location');
        $newEvent->price = $request->input('price');
        $newEvent->preorder_price = $request->input('preorder_price');
        $newEvent->description = $request->input('description');
       

        Storage::makeDirectory('public/images');
        $src= Storage::putFile('public/images' , $request->file('image'));
        $src = str_replace('public' , 'storage' , $src);
        $newEvent->photo = $src;

        $newEvent->save();


        return redirect() ->route('event_list');
    }

    public function editEvent($Eventid)
    {
        $event = Event::findorFail($Eventid);
        
        return view('event_change' , [
            'event' => $event,
        ]);
    }

    public function processEditEvent(Request $request, $Eventid)
    {
        $event = Event::findorFail($Eventid);
        $event->name = $request->input ('name');
        $event->photo = $request->input('photo');
        $event->event_start = $request->input('event_start');
        $event->event_end = $request->input('event_end');
        $event->available_tickets = $request->input('available_tickets');
        $event->location = $request->input('location');
        $event->price = $request->input('price');
        $event->preorder_price = $request->input('preorder_price');
        $event->description = $request->input('description');

        $event->save();

        return redirect('admin');
    }

    public function delete($id)
    {
        $event = Event::findorFail($id);
        $event->delete();

        return redirect('admin');
    }

    public function event_list(){
        $event = Event::all();
        
        return view('event_list' , [
            'events' =>$event
        ]);
}
}
