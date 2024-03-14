<div class="card col-4 bg-dark text-light">
    <div class="card-header">
        Создание типа услуг
    </div>
    <div class="card-body">
        <form action="{{ route('admin.addTypeOrder') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Тип заявки</label>
                <input type="text" class="form-control bg-dark text-light" id="name"
                       name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Стоимость услуги</label>
                <input type="number" class="form-control bg-dark text-light" id="price"
                       name="price" required>
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

