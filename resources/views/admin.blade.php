@extends('layouts.app')

@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
        $users = \App\Models\User::all();
    @endphp
    <div class="container">
        <div class=" row">
            @include('admin/add_type_order')
            @include('admin/view_all_types_orders')
            @include('admin/user_list')
        </div>
    </div>

@endsection
