<!DOCTYPE html>
<html lang="ru">
<head>
    <x-header.head/>
</head>
<body>
    <x-header.header/>       
    <div class="container">
        @yield('content')
        <div class="clearfix"></div>
    </div>
    <x-footer.footer/>
</body>
</html>
