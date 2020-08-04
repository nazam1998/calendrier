<?php

namespace App\Http\Controllers;

use App\Event;
use App\Sondage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SondageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sondages = Sondage::all();
        return view('admin.sondage.index', compact('sondages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sondage.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event.*' => 'required|integer',
        ]);

        $sondage = new Sondage();
        $sondage->title = $request->titre;
        $sondage->user_id = Auth::id();
        $sondage->save();
        return redirect()->route('sondage.index');
    }
    public function createEvent(Sondage $sondage)
    {
        return view('admin.sondage.createEvent', compact('sondage'));
    }

    public function storeEvent(Request $request, Sondage $sondage)
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
        $event = new Event();


        $event->title = $request->titre;
        $event->start = $debut;
        $event->end = $fin;
        $event->valide = false;
        $event->user_id = Auth::id();
        $event->save();
        $sondage->events()->attach($event->id);
        return redirect()->route('sondage.show', $sondage->id);
    }
    public function show(Sondage $sondage)
    {
        return view('admin.sondage.show', compact('sondage'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sondage $sondage)
    {
        $sondage->delete();
        return redirect()->back();
    }
}
