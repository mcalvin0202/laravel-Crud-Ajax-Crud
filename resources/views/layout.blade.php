
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Test</title>
<link rel="stylesheet" href="{{ asset('public/css/app.css')}}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="container">
        <p><br></p>
        @yield('content')
    </div>
</body>
</html>