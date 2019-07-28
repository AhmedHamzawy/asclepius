<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;
use App\Event;
use Auth;
use Activity;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $events = Event::all();
         return view('admin.events.index', compact('events'));

    }

    public function listEvents()
    {
        //
         $events = Event::paginate(5);
         return view('admin.events.list', compact('events'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventFormRequest $request)
    {
         $event = new Event(array(

         'title' => $request->get('title'),
         'url' => $request->get('url'),
         'start' => $request->get('start'),
         'end' => $request->get('end'),
 
          ));



          $event->save();

          $notification = array(
                'message' => 'A New Event '.$event->title.' Is Being Added', 
                'alert-type' => 'info'
           );
          
          Activity::log(Auth::User()->username.' Added'.' Event '.$event->title);

          return redirect('/admin/events')->with($notification);

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $event = Event::whereId($id)->firstOrFail();

         return view('admin.events.edit' , compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EventFormRequest $request)
    {
                
        $event = Event::whereId($id)->firstOrFail();

        $event->title = $request->get('title');
		$event->url = $request->get('url');
		$event->start = $request->get('start');
        $event->end = $request->get('end'); 
       
        $event->save();

        $notification = array(
                'message' => 'An '.$event->title.' Is Being Updated', 
                'alert-type' => 'info'
        );

        Activity::log(Auth::User()->username.' Updated'.' Event '.$event->title);

        return redirect(action('EventsController@edit', $event->id))->with($notification);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::whereId($id)->firstOrFail();

        $title = $event->title;

        $event->delete();

         $notification = array(
                'message' => 'An Event '.$title.' Is Being Deleted', 
                'alert-type' => 'info'
        );

        Activity::log(Auth::User()->username.' Deleted'.' Event '.$title);
        return redirect('/admin/events')->with($notification);
    }
}
