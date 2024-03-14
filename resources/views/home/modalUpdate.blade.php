

<!-- Модальное окно -->
<div class="modal fade " id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  text-light">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Редактировать профиль</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/home/update" enctype="multipart/form-data">
                    @csrf
                    <div class=" row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">ФИО</label>

                        <div class="col-md-6">
                            <input id="FIO" type="text" class="form-control text-black @error('FIO') is-invalid @enderror" name="FIO" value="{{$user->FIO}}"  autocomplete="FIO" autofocus>

                            @error('FIO')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class=" row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Почта</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class=" row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">Телефон</label>

                        <div class="col-md-6">
                            <input id="phone" value="{{$user->phone}}" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="photo"  class="col-md-4 col-form-label text-md-end">Фото</label>

                        <div class="col-md-6">
                            <input id="photo"   type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo">

                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
