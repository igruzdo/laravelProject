<h2>Hello, {{ Auth::user()->name }}</h2>
<br>
@if (Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}" style="color:red">В административную панель</a>
@endif
<br>
<a href="{{ route('account.logout') }}">Выход</a>