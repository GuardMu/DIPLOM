@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-10 bg-dark text-light">
                <div class="card-header">
                    Редактирование типа услуг
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.editTypeOrder') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orderType->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Тип заявки</label>
                            <input type="text" class="form-control bg-dark text-light" id="name"
                                   name="name" value="{{ $orderType->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Стоимость услуги</label>
                            <input type="number" class="form-control bg-dark text-light" id="price"
                                   name="price" value="{{ $orderType->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea class="form-control bg-dark text-light" id="description" name="description"
                                      required>{{ $orderType->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
