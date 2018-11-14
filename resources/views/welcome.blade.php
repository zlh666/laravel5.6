<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{--<style>--}}
            {{--html, body {--}}
                {{--background-color: #fff;--}}
                {{--color: #636b6f;--}}
                {{--font-family: 'Raleway', sans-serif;--}}
                {{--font-weight: 100;--}}
                {{--height: 100vh;--}}
                {{--margin: 0;--}}
            {{--}--}}

            {{--.full-height {--}}
                {{--height: 100vh;--}}
            {{--}--}}

            {{--.flex-center {--}}
                {{--align-items: center;--}}
                {{--display: flex;--}}
                {{--justify-content: center;--}}
            {{--}--}}

            {{--.position-ref {--}}
                {{--position: relative;--}}
            {{--}--}}

            {{--.top-right {--}}
                {{--position: absolute;--}}
                {{--right: 10px;--}}
                {{--top: 18px;--}}
            {{--}--}}

            {{--.content {--}}
                {{--text-align: center;--}}
            {{--}--}}

            {{--.title {--}}
                {{--font-size: 84px;--}}
            {{--}--}}

            {{--.links > a {--}}
                {{--color: #636b6f;--}}
                {{--padding: 0 25px;--}}
                {{--font-size: 12px;--}}
                {{--font-weight: 600;--}}
                {{--letter-spacing: .1rem;--}}
                {{--text-decoration: none;--}}
                {{--text-transform: uppercase;--}}
            {{--}--}}

            {{--.m-b-md {--}}
                {{--margin-bottom: 30px;--}}
            {{--}--}}
        {{--</style>--}}

    </head>
    <body>
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@auth--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ route('login') }}">Login</a>--}}
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endauth--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--<div class="content">--}}
                {{--<div class="title m-b-md">--}}
                    {{--Laravel--}}
                {{--</div>--}}

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                    {{--<a href="#">make in zhanglinhao</a>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
        <div id="app">
                <passport-clients></passport-clients>
                {{--<passport-authorized-clients></passport-authorized-clients>--}}
                {{--<passport-personal-access-tokens></passport-personal-access-tokens>--}}
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjE1ZDM0MzI2NzFmMzQ3MjI3YjUyZGQzZDgzMTk5NzJhNmRkMDQ5YmJiMTdjZDIyN2EyZjg4N2U0MzY2ZGU3ZTU1YTU4MTI2NDFiNWM5NjY3In0.eyJhdWQiOiI1IiwianRpIjoiMTVkMzQzMjY3MWYzNDcyMjdiNTJkZDNkODMxOTk3MmE2ZGQwNDliYmIxN2NkMjI3YTJmODg3ZTQzNjZkZTdlNTVhNTgxMjY0MWI1Yzk2NjciLCJpYXQiOjE1NDIxODMwNzEsIm5iZiI6MTU0MjE4MzA3MSwiZXhwIjoxNTQzNDc5MDcxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.fzuec1Ts6QIMDsQgB8tpN6yFBr7nkNov6ubS42kpXpGUXkVefVnKdlmUrrxdw4BZVHqDVA9t2wBB6UQbslu7eDMEn_weba6v6yxQGU992nu1Pt2s0k_suWq2V74vR9vJANAhaDKfg4XvqzvAHTTZyLmVMGAevQLxVsmpOevOz2VZxldILqe4LcHO3pXI63p4FKeYpZmqF2VH8VczIX7eG0pqYSJRlOa6fDRek8vHTWyIQjvozDuCtUekqKaP6N8F3f2PpP_YzFxG0ySAnRpE-56dKGcg4tGlvlW4__qgfGnc6zY-Io0TtkuOmbAhn1vw3BNlzdMd11pph8rTYNvVsfX8gq6vIW3BpiC_T4QcRxcJ8uA9nkYfHCSGuV0q2Wlh-j2lBmt3VUgNQ1woszoQdgGDC0z08O3s71r1fxsbHs_iXG5aCrZv4B-STFoVH_jJe8PKEcCExx21UvauAcyUrqJTGCAXm4dmt9CIjTitw3_ZmQzwMWuJKcQt7z1d_OowSm-OMk6MG1t24VNY4y5F-htybp3FXGav6DKl0wRll_ql8kTng0wTLWIzeW0XqstS20iY23O7-wFQgN-YztTJl9N_r2bau0HYnx85r0TDGa0UQcJcLB30UNQAZMvt8YwJpip0l3JPXFSGDaYXhyS21eJk0_KomCS7IFmSJS8QJjs';
             // token = null;

            axios.post('/api/saoma', {}, { headers: { 'Authorization': 'Bearer ' + token} } ) .then(res => {console.log(res.data)}) .catch(e => fn)

        </script>
    </body>
</html>
