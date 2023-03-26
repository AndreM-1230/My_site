@extends('welcome')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="current_password">Пароль:</label>
        <input id="current_password" type="password" class="form-control" name="current_password" required autocomplete="current-password">
    </div>

    <div class="form-group">
        <label for="password">Новый пароль:</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Подтверждение пароля:</label>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection
