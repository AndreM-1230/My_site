@extends('welcome')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Registration</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.registration') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Имя" id="nickname" class="form-control" name="nickname" required
                                           autofocus>
                                    @if ($errors->has('nickname'))
                                        <span class="text-danger">{{ $errors->first('nickname') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Логин" id="login" class="form-control" name="login" required
                                           autofocus>
                                    @if ($errors->has('login'))
                                        <span class="text-danger">{{ $errors->first('login') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="type" id="type" class="form-control" name="type" required>
                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
