<?php

namespace App\Http\Controllers;



class calendarController extends Controller
{
    public function __invoke(){
        return view('calendar');
    }
}
