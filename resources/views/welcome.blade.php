<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>corp site</title>

    <link rel="icon" type="image/x-icon" sizes="32x32" href="{{ URL::asset('db_logo.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/rating.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./resources/js/app.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="pages/pages.js"></script>
    <script type="text/javascript">


    </script>
</head>
<body>
<div class="navbar navbar-expand-lg navbar-default bg-dark text-white">
    <!--    navbar-fixed-top-->
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('welcome') }}">
                <img
                     src="{{ URL::asset('db_logo.png') }}"
                     width="64"
                     height="64"
                     alt="Информационная база данных производства"/></a>
        </div>

        <div class="navbar-header">
            <a href="{{ route('tables') }}" class="navbar-brand text-light">БД</a>
        </div>

        <div class="navbar-collapse collapse" style="color: #badbcc !important;" id="navbar-main">

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li class="nav-item">
                        <a class="navbar-brand text-light" href="{{ route('user.login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-light" href="{{ route('user.registration') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="navbar-brand text-light" href="{{ route('user.private') }}">Личный кабинет</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-light" href="{{ route('user.logout') }}">Выйти</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('task.index') }}" class="navbar-brand text-light">Задачи</a></li>
                @endguest


            </ul>
        </div>
    </div>
</div>
<div class="container">
    @yield('content')
    <div class="clearfix"></div>
</div>
</body>
</html>
