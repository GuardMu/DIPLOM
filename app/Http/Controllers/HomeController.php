<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TypeOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function order_page()
    {

        $orders = Order::all();
        $orderTypes = TypeOrder::all();
        return view('order', ['orders' => $orders, 'orderTypes' => $orderTypes]);

    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->only('FIO', 'phone', 'email');

        $file = $request->photo;

        if ($file) {
            $data['photo'] = $file->store('photo', 'public');
        }

        DB::table('users')->where('id',$user->id)->update($data);

        return redirect()->back();

    }
}
