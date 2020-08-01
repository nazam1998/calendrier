<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use LaravelFullCalendar\Facades\Calendar;
use Response,Redirect;

class WelcomeController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id', 'title', 'start', 'end']);
            return Response::json($data);
        }
        return view('welcome');
    }
}
