@if ($errors->any())
@foreach ($errors->all() as $error)
    <x-alert type="danger" :message="$error"></x-alert>
@endforeach
@endif
<form method="POST" action="{{ route('admin.news.store') }}">
@csrf
<div class="form-group">
    <label for="title">Введите ваше имя</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
</div>
<div class="form-group">
    <label for="description">Ваш комментарий</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
</div>    
    <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
</form>