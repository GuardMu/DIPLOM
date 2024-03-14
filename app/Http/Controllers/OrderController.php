<?php

namespace App\Http\Controllers;

use App\Models\TypeOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add_order(Request $request)
    {

    }

    public function add_type_order(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // имя обязательно, должно быть строкой и не длиннее 255 символов
            'description' => 'nullable|string', // описание может быть пустым, должно быть строкой
            'price' => 'required|numeric|min:0', // цена обязательна, должна быть числом не меньше 0
        ]);

        // Создание нового типа заказа с валидированными данными
        $orderType = TypeOrder::create($validatedData);

        // Возвращаем ответ, например, с сообщением об успехе
        return redirect()->route('admin_page')->with('success', 'Тип заказа: ' . $request->name . ' успешно добавлена');

    }

    public function type_order_edit(Request $request)
    {
        $order = TypeOrder::find($request->id);
        if ($order) {
            $order->name = $request->name;
            $order->description = $request->description;
            $order->price = $request->price;
            $order->save();
        }
        return redirect()->route('admin_page')->with('success', 'Тип заказа: ' . $request->name . ' успешно обновлен');
    }

    public function type_order_del($id)
    {
        $typeOrder = TypeOrder::find($id);
        if ($typeOrder) {
            TypeOrder::destroy($id);
            // Возвращаем ответ, например, с сообщением об успехе
            return redirect()->route('admin_page')->with('success', 'Тип заказа: ' . $typeOrder->name . ' успешно удалена');
        } else {
            // Если запись не найдена, возвращаем сообщение об ошибке
            return redirect()->route('admin_page')->with('error', 'Тип заказа не найден');
        }
    }
}
