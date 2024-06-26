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
                    <td class="col-3">{{$type_order->price}} ₽</td>
                    <td class="col-2">
                        <a href="{{ route('OpenEditOrderForm',['id' => $type_order->id]) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>
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

