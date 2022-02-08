<form method="POST" action="{{ route('feedback.index') }}">
@csrf
@include('inc.message')
<div class="form-group">
    <label for="name">Введите ваше имя</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
</div>
<div class="form-group">
    <label for="description">Ваш комментарий</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
</div>    
    <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
</form>