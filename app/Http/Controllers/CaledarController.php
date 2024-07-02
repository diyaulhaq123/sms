<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CalendarRepository;

class CaledarController extends Controller
{
    private $calendarRepo;

    public function __construct(CalendarRepository $calendarRepo){
        $this->calendarRepo = $calendarRepo;
    }

    public function calendar(){
        $events = $this->calendarRepo->getEvents();
        return view('admin.calendar', compact('events'));
    }

    public function events(){
        $events = $this->calendarRepo->getEvents();
        return view('admin.events', compact('events'));
    }

    public function createEvent(Request $request){
        $data = $request->validate(['title'=>'required', 'description'=> 'required', 'date' => 'required']);
        $this->calendarRepo->create($data);
        return redirect(route('calendar'))->with('success', 'Event was added');
    }

    public function updateEvent(Request $request){
        $data = $request->validate(['title'=>'required', 'description'=> 'required', 'date' => 'required', 'id'=>'required']);
        $this->calendarRepo->update($data, $request->id);
        return redirect(route('events'))->with('success', 'Event was updated');
    }

    public function editEvent(Request $request){
        $event = $this->calendarRepo->findOrFail($request->id);
        return view('admin.jpost.edit-event', compact('event'));
    }

    public function deleteEvent(Request $request){
        $this->calendarRepo->delete($request->id);
        return redirect()->back()->with('success', 'Event was deleted');
    }


}
