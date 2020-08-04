<?php

namespace App\Http\Controllers;

use App\Event;


class WelcomeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data = Event::where('valide', true)->whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id', 'title', 'start', 'end', 'valide','user_id']);
            return \Response::json($data);
        }
        return view('welcome');
    }
}
