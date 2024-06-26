<?php

namespace App\Http\Controllers;

use App\Models\TypeOrder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_page ()
    {
        if (Auth::user()->is_admin != 0){
            $type_orders =TypeOrder::all();
            $users = User::all();
            return view('admin',['type_orders'=>$type_orders, 'users'=>$users]);
        }else{
            return view('home');
        }
    }
    public function DeactivateAdminRole($id)
    {
        // Найти пользователя по ID
        $user = User::find($id);

        if ($user) {

            $user->is_admin = 0;
            $user->save();
            return response()->route('admin_page')->with(['success', 'Вы сняли роль Администратор']);
        } else {
            return response()->route('admin_page')->with(['success', 'Пользователь не найден']);
        }
    }
    public function ActivateAdminRole($id)
    {
        // Найти пользователя по ID
        $user = User::find($id);

        if ($user) {

            $user->is_admin = 1;
            $user->save();
            return redirect()->route('admin_page')->with('success', 'Вы назначили роль Администратор');
        } else {
            return redirect()->route('admin_page')->with('success', 'Пользователь не найден');
        }
    }
    public function DeactivateMasterRole($id)
    {
        // Найти пользователя по ID
        $user = User::find($id);

        if ($user) {

            $user->is_master = 0;
            $user->save();
            return redirect()->route('admin_page')->with('success', 'Вы сняли роль Мастер');
        } else {
            return redirect()->route('admin_page')->with('success', 'Пользователь не найден');
        }
    }
    public function ActivateMasterRole($id)
    {
        // Найти пользователя по ID
        $user = User::find($id);

        if ($user) {

            $user->is_master = 1;
            $user->save();
            return redirect()->route('admin_page')->with('success', 'Вы назначили роль Мастер');
        } else {
            return redirect()->route('admin_page')->with('success', 'Пользователь не найден');
        }
    }
    public function DeactivateManagerRole($id)
    {
        // Найти пользователя по ID
        $user = User::find($id);

        if ($user) {

            $user->is_manager = 0;
            $user->save();
            return redirect()->route('admin_page')->with('success', 'Вы сняли роль Менеджер');
        } else {
            return redirect()->route('admin_page')->with('success', 'Пользователь не найден');
        }
    }
    public function ActivateManagerRole($id)
    {
        // Найти пользователя по ID
        $user = User::find($id);

        if ($user) {

            $user->is_manager = 1;
            $user->save();
            return redirect()->route('admin_page')->with('success', 'Вы назначили роль Менеджер');
        } else {
            return redirect()->route('admin_page')->with('success', 'Пользователь не найден');
        }
    }

}
