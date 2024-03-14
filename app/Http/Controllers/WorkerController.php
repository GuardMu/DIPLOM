<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function worker_page ()
    {
        if (Auth::user()->is_worker != 0){
            return view('worker');
        }else{
            return view('home');
        }


    }
}
