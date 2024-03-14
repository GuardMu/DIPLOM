<?php

namespace App\Http\Controllers;

use App\Models\TypeOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_page ()
    {
        if (Auth::user()->is_admin != 0){
            $type_orders =TypeOrder::all();
            return view('admin',['type_orders'=>$type_orders]);
        }else{
            return view('home');
        }
    }

}
