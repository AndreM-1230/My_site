<!DOCTYPE html>
<html lang="ru">
<head>
    <x-header.head/>
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
    <div class="wrapper flex flex-1 flex-col">
    <x-header.header/>
    <main class="flex-1 container mx-auto bg-white">
    <div class="content">
        @yield('content')
        
    </div>
    
    </main>
    <x-footer.footer/>
    </div>
    
</body>
</html>
