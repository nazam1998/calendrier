<?php

namespace App\Http\Controllers;

use App\Sondage;
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
        return view('admin.sondage.index',compact('sondages'));
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
            'event.*'=>'required|integer',
        ]);

        $sondage = new Sondage();
        $sondage->user_id = Auth::id();
        $sondage->save();

        $sondage->
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function show(Sondage $sondage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function edit(Sondage $sondage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sondage $sondage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sondage $sondage)
    {
        //
    }
}
