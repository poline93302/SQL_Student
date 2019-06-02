<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>學生訪談系統</title>
</head>
    @include('layout.csslink')
<body>
    <div id="app">
        <header class="navbor">
            <span>學生訪談系統</span>
        </header>

        <div class="context flex">
            @yield('content-play')
        </div>

        <footer class="foot" style="color:white;text-align: center">
            <span>40543208 吳尚謙</span>&nbsp;&nbsp;
            <span>40543226 唐煒傑</span>&nbsp;&nbsp;
            <span>40543236 陳膺祿</span>&nbsp;&nbsp;
            <span>40543238 黃浩東</span>&nbsp;&nbsp;
        </footer>
    </div>

</body>
    @include('layout.jsScrt')
</html>