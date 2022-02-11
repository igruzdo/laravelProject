<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
            <span data-feather="home"></span>
            Панель управления
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
            <span data-feather="file"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
            <span data-feather="file"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.feedback.*')) active @endif" href="{{ route('admin.feedback.index') }}">
            <span data-feather="file"></span>
            Обратная связь
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.orderinfos.*')) active @endif" href="{{ route('admin.orderinfos.index') }}">
            <span data-feather="file"></span>
            Заказы
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index') }}">
            <span data-feather="file"></span>
            Пользователи
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.resource.*')) active @endif" href="{{ route('admin.resource.index') }}">
            <span data-feather="file"></span>
            Ресурсы для парсинга новостей
          </a>
        </li>
      </ul>
    </div>
  </nav>