<div class="col-8">
    <table class="table text-light ">
        <thead>
        <tr>
            <th class="col-1">№</th>
            <th class="col-1">Тип</th>
            <th class="col-8">Описание</th>
            <th class="col-3">Цена</th>
            <th class="col-2"> ______</th>
            <th class="col-2"> ______</th>
        </tr>
        </thead>
        @if(is_countable($type_orders) && count($type_orders))
            @foreach($type_orders as $type_order)
                <tr>
                    <th class="col-1">{{$type_order->id}}</th>
                    <td class="col-1">{{$type_order->name}}</td>
                    <td class="col-6">{{$type_order->description}}</td>
                    <td class="col-3">{{$type_order->price}}</td>
                    <td class="col-2">

                    </td>
                    <td class="col-2">
                        <form action="/admin/TypeOrder/{{$type_order->id}}/del" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-dash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        @endif
    </table>
</div>

