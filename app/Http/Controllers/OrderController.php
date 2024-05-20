<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TypeOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function add_type_order(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Создание нового типа заказа с валидированными данными
        $typeOrder = new TypeOrder();
        $typeOrder->name = $validatedData['name'];
        $typeOrder->description = $validatedData['description'] ?? null;
        $typeOrder->price = $validatedData['price'];
        $typeOrder->save();


        return redirect()->route('admin_page')->with('success', 'Тип заказа успешно добавлен');
    }
    public function store(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request;
        // Генерация случайного кода заказа из 10 символов
        $orderCode = Str::random(10);

        // Проверка уникальности кода заказа
        while (Order::where('order_code', $orderCode)->exists()) {
            $orderCode = Str::random(10);
        }

        // Создание новой заявки с валидированными данными
        $order = new Order();
        $order->client_name = $validatedData['client_name'];
        $order->client_number = $validatedData['client_number'];
        $order->master_id = $validatedData['master_id'];
        $order->tags = $validatedData['tags'] ?? null;
        $order->description = $validatedData['description'] ?? null;
        $order->order_code = $orderCode;
        $order->full_price = $request->input('full_price');
        $order->status = 'получен';
        $order->save();

        // Возвращаем ответ, например, с сообщением об успехе
        return redirect()->route('order')->with('success', 'Заявка успешно создана');
    }
    public function type_order_del($id)
    {
        // Найти тип заказа по идентификатору
        $orderType = TypeOrder::find($id);

        // Проверить, существует ли тип заказа
        if (!$orderType) {
            // Если тип заказа не найден, вернуть сообщение об ошибке
            return redirect()->back()->with('error', 'Тип заказа не найден.');
        }

        // Удалить тип заказа
        $orderType->delete();

        // Вернуть сообщение об успешном удалении
        return redirect()->back()->with('success', 'Тип заказа успешно удален.');
    }
    public function showEditForm($id)
    {
        $orderType = TypeOrder::find($id);

        if (!$orderType) {
            return redirect()->back()->with('error', 'Тип заявки не найден.');
        }

        return view('order.edit.EditingOrderType', compact('orderType'));
    }

    public function showTagForm($id)
    {
        $orderType = TypeOrder::find($id);

        if (!$orderType) {
            return redirect()->back()->with('error', 'Тег не найден.');
        }

        return view('order.edit.EditingOrderType', compact('orderType'));
    }
    public function editTypeOrder(Request $request)
    {

        // Найти тип заявки по идентификатору
        $orderType = TypeOrder::find($request->id); // Предположим, что идентификатор передается в запросе

        // Проверить, существует ли тип заявки
        if (!$orderType) {
            return redirect()->back()->with('error', 'Тип заявки не найден.');
        }

        // Обновить данные
        $orderType->name = $request->name;
        $orderType->price = $request->price;
        $orderType->description = $request->description;
        $orderType->save();


        return redirect()->route('admin_page')->with('success', 'Тип заявки успешно обновлен.');
    }
    public function assignOrderToMaster(Request $request)
    {
        $orderId = $request->input('order_id');
        $master = Auth::user();

        // Находим заказ
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->route('welcome')->with('error', 'Заказ не найден');
        }

        if ($master->is_master === 0) {
            return redirect()->route('welcome')->with('error', 'Вы не являетесь Мастером');
        }

        // Назначаем заказ мастеру
        $order->master_id = $master->id;
        $order->status = 'принят';
        $order->save();

        return redirect()->route('welcome')->with('message', 'Вы приняли заказ');
    }

}
