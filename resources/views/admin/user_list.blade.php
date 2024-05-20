<hr class="col-12 text-light mt-5">
<div class="col-12 ">
    <table class="table text-light">
        <thead>
        <tr>
            <th class="col-1">№</th>
            <th class="col-4">ФИО</th>
            <th class="col-2">Админ</th>
            <th class="col-2">Мастер</th>
            <th class="col-2">Менеджер</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user )
            <tr>
                <td class="col-2">{{$user->id}}</td>
                <td class="col-2">{{$user->FIO}}</td>
                <td class="col-2">
                    @if($user->is_admin === 1)

                        <p class="text-success col-6">Выдано</p>
                        <a href="/admin/DeactivateAdm/{{$user->id}}" class="btn btn-danger col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-ban" viewBox="0 0 16 16">
                                <path
                                    d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                        </a>

                    @else
                        <p class="text-warning">Отсутствует</p>
                    @endif
                </td>
                <td class="col-2">
                    @if($user->is_master === 1)

                        <p class="text-success col-6">Выдано</p>
                        <a href="/admin/DeactivateMas/{{$user->id}}" class="btn btn-danger col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-ban" viewBox="0 0 16 16">
                                <path
                                    d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                        </a>

                    @else
                        <p class="text-warning">Отсутствует</p>
                    @endif
                </td>
                <td class="col-2">
                    @if($user->is_manager === 1)

                        <p class="text-success col-6">Выдано</p>
                        <a href="/admin/DeactivateMan/{{$user->id}}" class="btn btn-danger col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-ban" viewBox="0 0 16 16">
                                <path
                                    d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                        </a>
                    @else
                        <p class="text-warning">Отсутствует</p>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
