<li>
    <a href="/" class="nav-link">
        <img class="bi d-block mx-auto mb-1" src="/icons/house.svg" width="24" height="24" alt="Иконка">
        Главная
    </a>
</li>
<li>
    <a href="{{ route('table.index') }}" class="nav-link">
        <img class="bi d-block mx-auto mb-1" src="/icons/server.svg" width="24" height="24" alt="Иконка">
        БД
    </a>
</li>
<li>
    <a href="{{ route('tasks.index') }}" class="nav-link">
        <img class="bi d-block mx-auto mb-1" src="/icons/ui-checks-grid.svg" width="24" height="24" alt="Иконка">
        Задачи
    </a>
</li>
<li>
    <a href="{{ route('user.private') }}" class="nav-link">
        <img class="bi d-block mx-auto mb-1" src="/icons/person-fill.svg" width="24" height="24" alt="Иконка">
        Профиль
    </a>
</li>
<li>
    <a class="nav-link" href="{{ route('user.logout') }}">
        <img class="bi d-block mx-auto mb-1" src="/icons/x-lg.svg" width="24" height="24" alt="Иконка">
        Выйти
    </a>
</li>
