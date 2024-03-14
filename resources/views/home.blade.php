@extends('layouts.app')

@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user()
    @endphp

    <section class="text-light bg-dark mx-5" style="background-color: #eee;">
        <div class="container py-5 ">

            <div class="row">

                <div class="col-lg-4">
                    <div class="card bg-dark mb-4">
                        <div class="card-body text-center">
                            <img src="public/storage/{{$user->photo}}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="height: 150px; width: 150px;">
                            <h5 class="my-3">{{$user->FIO}}</h5>


                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ФИО</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->FIO}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row ">
                                <div class="col-sm-3">
                                    <p class="mb-0">Почта</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Телефон</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->phone}}</p>
                                </div>
                            </div>
                            @if($user->is_master != 0 )
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Статус</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class=" mb-0 @if($user->is_admin != 0)text-warning @else text-danger @endif "> @if($user->is_admin != 0)
                                                Admin
                                            @else
                                                Мастер
                                            @endif</p>
                                    </div>
                                </div>

                            @endif


                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>



            </div>

            <div class="text-end ">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser">
                    Редактировать
                </button>
            </div>
        </div>
    </section>
    @include('home.modalUpdate')

@endsection
