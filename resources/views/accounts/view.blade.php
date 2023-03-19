@extends('welcome')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Привет, {{ Auth::user()->nickname }} !</h3>
                        <div class="card-body">
                            <p>Страничка аккаунта</p>
                            <p>Последнее изменение данных:  {{ Auth::user()->updated_at }}</p>
                            <a href="{{ route('setting') }}">Настройки</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
