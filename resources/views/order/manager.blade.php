<div class="col-6 card bg-dark text-light">
    <div class="card-header">
        Создание заявок
    </div>
    <div class="card-body">
        <form id="requestForm" method="POST" action="{{ route('requests.store') }}">
            @csrf

            <div class="mb-3">
                <label for="tagsInput" class="form-label">Теги</label>
                <input id="tagsInput" type="text" class="form-control bg-dark text-light" placeholder="Поиск тегов"/>
                <div id="tagsContainer" class="d-flex flex-wrap mt-2">
                    @foreach($orderTypes as $typeOrder)
                        <button type="button" class="btn btn-secondary me-2 mb-2"
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
            <button type="submit" class="btn btn-primary">Создать заявку</button>
        </form>
    </div>
</div>

<div class="col-6">
    <table class="table text-light">
        <thead>
        <tr>
            <th class="col-1">№</th>
            <th class="col-2">Теги</th>
            <th class="col-2">Код заказа</th>
            <th class="col-2">Дата получения</th>
            <th class="col-2">Дата выполнения</th>
            <th class="col-2">Мастер</th>
        </tr>
        </thead>
        <tbody>
        @if(is_countable($orders) && count($orders))
            @foreach($orders as $order)
                @if($order)
                    <tr>
                        <th class="col-1">{{ $order->id }}</th>
                        <td class="col-2">{{ $order->tags }}</td>
                        <td class="col-2">{{ $order->order_code }}</td>
                        <td class="col-2">{{ $order->received_at }}</td>
                        <td class="col-2">{{ $order->completed_at }}</td>
                        <td class="col-2">{{ $order->master_id }}</td>
                    </tr>
                @endif
            @endforeach
        @endif
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tagsInput = document.getElementById('tagsInput');
        const tagsContainer = document.getElementById('tagsContainer');
        const hiddenTagsInput = document.getElementById('tags');
        const maxTagsPerPage = 15; // Максимальное количество тегов на странице

        let allTags = Array.from(tagsContainer.children); // Массив для всех тегов

        // Функция для скрытия тегов
        function hideTags(startIndex) {
            allTags.slice(startIndex).forEach(tagButton => {
                tagButton.style.display = 'none';
            });
        }

        // Функция для отображения всех тегов
        function showAllTags() {
            allTags.forEach(tagButton => {
                tagButton.style.display = '';
            });
        }

        // Функция для обновления скрытого поля с тегами
        function updateTagsField() {
            const selectedTags = allTags.filter(tagButton => tagButton.classList.contains('selected')).map(tagButton => tagButton.textContent);
            hiddenTagsInput.value = selectedTags.join(',');
        }

        // Функция для фильтрации и отображения тегов
        function filterTags(searchText) {
            let count = 0;
            allTags.forEach(tagButton => {
                const tagText = tagButton.textContent.toLowerCase();
                const isVisible = tagText.includes(searchText.toLowerCase()) || !searchText;
                tagButton.style.display = isVisible ? '' : 'none';
                if (isVisible && ++count > maxTagsPerPage) {
                    tagButton.style.display = 'none';
                }
            });
        }

        // Функция для закрепления выбранных тегов в начале всех тегов и изменения их цвета на синий
        function prioritizeSelectedTags() {
            const selectedTags = Array.from(tagsContainer.querySelectorAll('.btn.selected'));
            selectedTags.forEach(tagButton => {
                tagsContainer.prepend(tagButton);
                tagButton.classList.remove('btn-secondary');
                tagButton.classList.add('btn-primary');
            });
        }

        // Обработчик события для ввода тегов
        tagsInput.addEventListener('input', (event) => {
            filterTags(event.target.value);
        });

// Добавляем обработчик клика для каждой кнопки с тегом
        tagsContainer.addEventListener('click', (event) => {
            if (event.target.tagName === 'BUTTON') {
                const tagName = event.target.textContent;

                // Проверяем, выбран ли тег
                if (event.target.classList.contains('selected')) {
                    // Если тег уже выбран, удаляем его из списка выбранных и показываем его
                    event.target.classList.remove('selected');
                    event.target.style.display = '';
                } else {
                    // Если тег не выбран, добавляем его в список выбранных и скрываем его
                    event.target.classList.add('selected');
                    event.target.style.display = 'none';
                }

                // Обновляем скрытое поле с выбранными тегами
                updateTagsField();

                // Очищаем поисковую строку
                tagsInput.value = '';
                // После очистки строки фильтруем теги без текста
                filterTags('');

                // Закрепляем выбранные теги в начале всех тегов и изменяем их цвет на синий
                prioritizeSelectedTags();

                // Показываем скрытые теги, если они были выбраны
                const selectedHiddenTags = Array.from(tagsContainer.querySelectorAll('.btn.selected[style="display: none;"]'));
                selectedHiddenTags.forEach(tagButton => {
                    tagButton.style.display = '';
                });
            }
        });

        // Проверяем, сколько тегов отображается на странице
        if (allTags.length > maxTagsPerPage) {
            hideTags(maxTagsPerPage);
        }

        // Закрепляем выбранные теги в начале всех тегов и изменяем их цвет на синий после загрузки страницы
        prioritizeSelectedTags();
    });
</script>
