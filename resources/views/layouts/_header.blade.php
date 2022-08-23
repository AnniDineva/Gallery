<div class="">
<div class="row">
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">Начало</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('gallery')}}">Снимки</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('user')}}">Потребители</a>
        </li>
        @guest
        <li class="nav-item">
            <a class="nav-link " href="{{route('contacts')}}">Контакти</a>
        </li>
        <li> 
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#loginModal" data-target=".bd-example-modal-lg">Вход</button>
        </li>
        <li> 
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#registerModal" data-target=".bd-example-modal-lg">Регистрация</button>
        </li>
        
        
       
        @endguest
        @auth
            @if (Auth::user()->is_admin!==1)
                <li class="nav-item">
                    <a class="nav-link " href="{{route('contacts')}}">Контакти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('upload_image')}}">Качи Снимка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('profile')}}">Профил</a>
                </li>
            @endif
        
        <li>
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <button type="submit" class="btn btn-danger">Изход</button>
            </form>
        </li>
        @endauth
    </ul>
</div>
</div>
