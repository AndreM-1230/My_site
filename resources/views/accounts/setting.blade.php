@extends('welcome')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="current_password">Current Password</label>
        <input id="current_password" type="password" class="form-control" name="current_password" required autocomplete="current-password">
    </div>

    <div class="form-group">
        <label for="password">New Password</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-primary">Change Password</button>
</form>
@endsection
