<h2>Hello, {{ Auth::user()->name }}</h2>
<br>
@if (Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}" style="color:red">В административную панель</a>
@endif
<br>

@if (Auth::user()->avatar)
    <img src="{{ Auth::user()->avatar }}" alt="avatar" style="width:250px;">
@endif
<a href="{{ route('account.logout') }}">Выход</a>