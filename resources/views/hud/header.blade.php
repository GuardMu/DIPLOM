@php
    $AuthUser = \Illuminate\Support\Facades\Auth::check();
    $UserAuthId = \Illuminate\Support\Facades\Auth::user();
@endphp

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{url('/')}}" class="nav-link px-2 text-secondary">{{ config('app.name', 'Laravel') }}</a>
                </li>
                <li><a href="#" class="nav-link px-2 text-white">-</a></li>
                @if($AuthUser)
                    @if($UserAuthId->is_manager == 1)
                        <li><a href="/order" class="nav-link px-2 text-white">Оформить заказ</a></li>
                    @endif

                @endif

                @if($AuthUser)
                    <li><a href="/home" class="nav-link px-2 text-white ">Профиль</a></li>
                    @if($UserAuthId->is_master == 1)

                        <li><a href="/order" class="nav-link px-2 text-danger ">Работа</a></li>

                        @if($UserAuthId->is_admin == 1)

                            <li><a href="/admin" class="nav-link px-2 text-warning ">Админка</a></li>

                        @endif
                    @endif

                @endif
            </ul>


            <div class="text-end">
                @guest

                    @if (Route::has('login'))
                        <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Вход</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-warning" href="{{ route('register') }}">Регистрация</a>
                    @endif

                @endguest



                @if(\Illuminate\Support\Facades\Auth::check())
                    <div>
                        <a class="btn btn-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выход
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endif


            </div>
        </div>
    </div>

</header>
