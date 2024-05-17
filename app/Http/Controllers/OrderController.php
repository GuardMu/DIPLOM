<?php

namespace App\Http\Controllers;

use App\Models\TypeOrder;
use Illuminate\Http\Request;
use App\Models\CustomRequest; // Модель для работы с заявками

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

        // Возвращаем ответ, например, с сообщением об успехе
        return redirect()->route('admin_page')->with('success', 'Тип заказа успешно добавлен');
    }
    public function store(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'tags' => 'nullable|string',
            'description' => 'required|string',
        ]);

        // Создание новой заявки с валидированными данными
        $customRequest = new CustomRequest();
        $customRequest->tags = $validatedData['tags'];
        $customRequest->description = $validatedData['description'];
        $customRequest->save();

        // Возвращаем ответ, например, с сообщением об успехе
        return redirect()->route('admin_page')->with('success', 'Заявка успешно создана');
    }


}
