@extends('layouts.app')

@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user()
    @endphp


@endsection

