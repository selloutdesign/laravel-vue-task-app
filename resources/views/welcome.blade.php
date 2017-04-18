<!DOCTYPE html>
<html lang="en">
    <head>
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel 5.3 with Vuejs</title>
        <meta name="token" id="token" value=" {{ csrf_token() }} " >
    </head>
    <body>
        <div class="container" id="app">
            <h1>Laravel Vue Task App</h1>
            <tasks></tasks>
        </div>

        <script src="/js/app.js"></script>
        
    </body>
</html>