<table class="table text-light ">
    <thead>
    <tr>
        <th class="col-1">№</th>
        <th class="col-2">Тип</th>
        <th class="col-2">Код заказа</th>
        <th class="col-2">Дата получения</th>
        <th class="col-2">Дата выполнения</th>
        <th class="col-2"></th>
    </tr>
    </thead>

    <tbody>
    @if(is_countable($orders) && count($orders))
        @foreach($orders as $order)
            @if($order->master_id == $user->id)
                <tr>
                    <th class="col-1">{{$order->id}}</th>
                    <td class="col-2">{{$order->order_type}}</td>
                    <td class="col-2">{{$order->order_code}}</td>
                    <td class="col-2">{{$order->received_at}}</td>
                    <td class="col-2">{{$order->completed_at}}</td>
                    <td class="col-2">
                        <button class="btn btn-warning" type="button">
                            Завершить
                        </button>
                    </td>
                </tr>
            @endif
        @endforeach
    @endif
    </tbody>
</table>
