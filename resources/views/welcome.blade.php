@extends('layouts.app')
@php
    $orders = \App\Models\Order::all();
    $orderTypes = \App\Models\TypeOrder::all();
    $User =\Illuminate\Support\Facades\Auth::user();
@endphp
@section('content')

    <div class="col-8 offset-md-2">
        <table class="table text-light">
            <thead>
            <tr>
                <th class="col-1">№</th>
                <th class="col-2">Теги</th>
                <th class="col-2">Код заказа</th>
                <th class="col-2">Дата получения</th>
                <th class="col-2">Принять</th>
            </tr>
            </thead>
            <tbody>
            @if(is_countable($orders) && count($orders))
                @foreach($orders as $order)
                    @if($order)
                        @if($order->status === 'получен')
                            <tr>
                                <th class="col-1">{{ $order->id }}</th>
                                <td class="col-2">

                                    @foreach($orderTypes as $type)
                                        @if(in_array($type->id, explode(',', $order->tags)))
                                            <a class="btn btn-primary" href="">
                                                {{ $type->name }}
                                            </a>

                                        @endif
                                    @endforeach
                                </td>
                                <td class="col-2">{{$order->order_code}}</td>
                                <td class="col-2">{{$order->created_at}}</td>
                                <td class="col-2">
                                    <form id="assignOrderForm" action="{{ route('assignOrderToMaster') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-arrow-right-square"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                                                    <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
                                                </svg></i>
                                        </button>
                                    </form>
                                </td>





                            </tr>
                        @endif

                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
