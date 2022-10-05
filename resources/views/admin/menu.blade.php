<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">Главная</a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">Главная админка</a>
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
