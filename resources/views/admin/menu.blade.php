<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">Главная</a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">Главная админка</a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('admin.category.index') ? 'active' : '' }}" id="crudDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">CRUD</a>
    <ul class="dropdown-menu" aria-labelledby="crudDropdown">
        <li><a class="dropdown-item" href="{{ route('admin.category.index') }}">Категории</a></li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('admin.news.create') }}" class="nav-link {{ request()->routeIs('admin.news.create') ? 'active' : '' }}">Добавить новость</a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.test1') }}" class="nav-link">Скачать избражение</a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.test2') }}" class="nav-link">Скачать новость</a>
</li>
