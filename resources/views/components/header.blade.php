<header style="margin-bottom: 50px">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('news/index') }}">News agregator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link  @if(request()->routeIs('admin.*')) active @endif" aria-current="page" href="{{ route('admin.index') }}">Administrator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  @if(request()->routeIs('feedback')) active @endif" href="{{ route('feedback') }}">Обратная связь</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(request()->routeIs('orderinfo')) active @endif" href="{{ route('orderinfo') }}">Заказать выгрузку данных</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>