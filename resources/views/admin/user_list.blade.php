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
                <td class="col-1">{{$user->id}}</td>
                <td class="col-2">{{$user->FIO}}</td>
                <td class="col-2 ">
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
                        <a href="/admin/ActivateAdm/{{$user->id}}" class="btn btn-success col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                            </svg>
                        </a>
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
                        <a href="/admin/ActivateMas/{{$user->id}}" class="btn btn-success col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                            </svg>
                        </a>
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
                        <a href="/admin/ActivateMan/{{$user->id}}" class="btn btn-success col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                            </svg>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
