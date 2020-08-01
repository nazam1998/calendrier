<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect, Response;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }
    public function create()
    {
        return view('admin/event/add');
    }
    public function store(Request $request)
    {

        $request->validate([
            'titre' => "required|string|min:3",
            'debut' => "required|date|after:yesterday",
            'debut_heure' => "required",
            'fin' => "required|date|after:debut-1",
            'fin_heure' => "required",
            'description' => "nullable|string|min:2",
        ]);


        $debut = Carbon::parse($request->debut . " " . $request->debut_heure);
        $fin = Carbon::parse($request->fin . " " . $request->fin_heure);

        Event::insert(
            [
                'title' => $request->titre,
                'start' => $debut,
                'end' => $fin,
            ]
        );
        return redirect('/');
    }
    public function edit(Event $event){
        return view('admin.event.edit',compact('event'));
    }
    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
        return Response::json($event);
    }
    public function destroy(Request $request)
    {
        $event = Event::where('id', $request->id)->delete();
        return Response::json($event);
    }
}
