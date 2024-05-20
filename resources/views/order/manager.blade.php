<h2 class="text-light">Пространство Менеджера</h2>

<div class="col-6 card bg-dark text-light">

    <div class="card-header">
        Создание заявок
    </div>
    <div class="card-body">
        <form id="requestForm" method="POST" action="{{ route('order.add') }}">
            @csrf

            <div class="mb-3">
                <label for="clientName" class="form-label">Имя клиента</label>
                <input id="clientName" type="text" class="form-control bg-dark text-light" name="client_name" required/>
            </div>

            <div class="mb-3">
                <label for="clientNumber" class="form-label">Номер клиента</label>
                <input id="clientNumber" type="text" class="form-control bg-dark text-light" name="client_number"
                       required/>
            </div>

            <div class="mb-3">
                <label for="tagsInput" class="form-label">Теги</label>
                <input id="tagsInput" type="text" class="form-control bg-dark text-light" placeholder="Поиск тегов"/>
                <div id="tagsContainer" class="d-flex flex-wrap mt-2">
                    @foreach($orderTypes as $typeOrder)
                        <button type="button" class="btn btn-secondary me-2 mb-2"
                                data-id="{{ $typeOrder->id }}"
                                data-tag="{{ $typeOrder->name }}">{{ $typeOrder->name }}</button>
                    @endforeach
                </div>
                <input type="hidden" id="tags" name="tags"/>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control bg-dark text-light" id="description" name="description"
                          required></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Цена: <span id="priceDisplay">0.00</span> ₽ </label>
                <input type="hidden" name="full_price" id="full_price_input" value="0.00">
            </div>

            <button type="submit" class="btn btn-primary">Создать заявку</button>
        </form>
    </div>
</div>


<div class="col-6">
    <table class="table text-light">
        <thead>
        <tr>
            <th class="col-1">№</th>
            <th class="col-2">Код заказа</th>
            <th class="col-2">Дата получения</th>
            <th class="col-2">Дата выполнения</th>
            <th class="col-2">Клиент</th>
            <th class="col-2">Номер</th>
            <th class="col-2">Мастер</th>
        </tr>
        </thead>
        <tbody>
        @if(is_countable($orders) && count($orders))
            @foreach($orders as $order)
                @if($order)
                    @if($order->status === 'выполнен')
                        <tr>
                            <th class="col-1">{{ $order->id }}</th>
                            <td class="col-2">{{$order->order_code}}</td>
                            <td class="col-2">{{$order->created_at}}</td>
                            <td class="col-2">{{$order->updated_at}}</td>
                            <td class="col-2">{{$order->client_name}}</td>
                            <td class="col-2">{{$order->client_number}}</td>
                            @foreach($users as $user)
                                <td class="col-2">
                                    @php
                                        $master = \App\Models\User::find($order->master_id);
                                    @endphp
                                    {{$master->FIO}}</td>

                            @endforeach
                        </tr>
                    @else

                    @endif

                @endif
            @endforeach
        @endif
        </tbody>
    </table>
</div>

<hr class="col-12 text-light mt-5">
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tagsInput = document.getElementById('tagsInput');
        const tagsContainer = document.getElementById('tagsContainer');
        const hiddenTagsInput = document.getElementById('tags');
        const priceDisplay = document.getElementById('priceDisplay');
        const maxTagsPerPage = 15;

        let allTags = Array.from(tagsContainer.children); // Массив для всех тегов
        let selectedTags = []; // Массив для выбранных тегов

        function hideTags(startIndex) {
            allTags.slice(startIndex).forEach(tagButton => {
                tagButton.style.display = 'none';
            });
        }

        function updateTagDisplay(tagButton, isSelected) {
            tagButton.classList.toggle('selected', isSelected);
            tagButton.style.display = isSelected ? '' : 'none';
            tagButton.classList.toggle('btn-primary', isSelected);
            tagButton.classList.toggle('btn-secondary', !isSelected);
        }

        function updateTagsField() {
            hiddenTagsInput.value = selectedTags.join(',');
        }

        function updateTotalPrice() {
            let totalPrice = 0;
            selectedTags.forEach(tagId => {
                const tagPrice = parseFloat(getTagPriceById(tagId)); // Получаем цену тега по его ID
                totalPrice += tagPrice;
            });
            return totalPrice.toFixed(2); // Округляем до двух знаков после запятой
        }

        function getTagPriceById(tagId) {
            const orderTypes = {!! json_encode($orderTypes) !!};

            // Преобразуем tagId в число
            tagId = parseInt(tagId);

            // Используем метод find для поиска тега по его id
            const tag = orderTypes.find(tag => tag.id === tagId);

            // Если тег найден, возвращаем его цену
            if (tag && tag.price) {
                // Преобразуем цену из строки в число
                return parseFloat(tag.price);
            } else {
                // Возвращаем 0, если объект с таким id не найден или цена не определена
                return 0;
            }
        }


        function updateTotalPriceAndDisplay() {
            priceDisplay.textContent = updateTotalPrice();
            const newPrice = parseFloat(updateTotalPrice()).toFixed(2); // Обновление отображаемой цены
            document.getElementById('priceDisplay').innerText = newPrice;
            document.getElementById('full_price_input').value = newPrice; // Обновление значения скрытого поля full_price
        }


        function filterTags(searchText) {
            allTags.forEach(tagButton => {
                const tagText = tagButton.textContent.toLowerCase();
                const isVisible = tagText.includes(searchText.toLowerCase()) || !searchText;
                tagButton.style.display = isVisible ? '' : 'none';
            });
        }

        tagsInput.addEventListener('input', () => {
            filterTags(tagsInput.value);
        });

        tagsContainer.addEventListener('click', (event) => {
            if (event.target.tagName === 'BUTTON') {
                const tagButton = event.target;
                const tagId = tagButton.getAttribute('data-id');
                const isSelected = !tagButton.classList.contains('selected');

                updateTagDisplay(tagButton, isSelected);

                const index = selectedTags.indexOf(tagId);
                if (isSelected && index === -1) {
                    selectedTags.push(tagId);
                } else if (!isSelected && index !== -1) {
                    selectedTags.splice(index, 1);
                }

                updateTagsField();
                tagsInput.value = '';
                filterTags('');
                updateTotalPriceAndDisplay();
            }
        });

        if (allTags.length > maxTagsPerPage) {
            hideTags(maxTagsPerPage);
        }

        updateTotalPriceAndDisplay();
    });

</script>

