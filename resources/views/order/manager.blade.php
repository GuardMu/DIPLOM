<div class="col-6 card bg-dark text-light">
    <div class="card-header">
        Создание заявок
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf

            <div class="mb-3">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-toggle="dropdown" aria-expanded="false">
                        Тип заявки
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item active" href="#">Action</a></li>

                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control bg-dark text-light" id="description" name="description"
                          required> </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Создать заявку</button>
        </form>
    </div>
</div>
<div class="col-6">
    <table class=" table text-light ">
        <thead>
        <tr>
            <th class="col-1">№</th>
            <th class="col-2">Тип</th>
            <th class="col-2">Код заказа</th>
            <th class="col-2">Дата получения</th>
            <th class="col-2">Дата выполнения</th>
            <th class="col-2">Мастер</th>
        </tr>
        </thead>

        <tbody>
        @if(is_countable($orders) && count($orders))
            @foreach($orders as $order)
                @if($order)
                    <tr>
                        <th class="col-1">{{$order->id}}</th>
                        <td class="col-2">{{$order->order_type}}</td>
                        <td class="col-2">{{$order->order_code}}</td>
                        <td class="col-2">{{$order->received_at}}</td>
                        <td class="col-2">{{$order->completed_at}}</td>
                        <td class="col-2">{{$order->master_id}}</td>
                    </tr>
                @endif
            @endforeach
        @endif
        </tbody>
    </table>
</div>
