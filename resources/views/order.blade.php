@extends('layouts.app')

@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
        $users = \App\Models\User::all();

    @endphp
    <div class="container">
        <div class="row">

            @if($user->is_manager == 1 )

    @include('order/manager')

            @endif
            @if($user->is_master ==1)
                @include('order/master')
            @endif
        </div>
    </div>
@endsection
