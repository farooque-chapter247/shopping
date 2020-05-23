<!DOCTYPE html>
<html>
<head>
<title>Products </title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<title>{{ config('app.name', 'Shopping') }}</title>

<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
@yield('css_after')
</head>
<body>

@include('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
@routes   
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
@yield('js_after')
</html>