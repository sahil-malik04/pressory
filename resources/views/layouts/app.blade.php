<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name = "keyword" content="">
    <meta name = "description" content="">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title> Pressory </title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
    
</head>
<body>
 
  <div id="app">
    
  
    <main class="py-0">
        @yield('content')
    </main>
    
  </div>
  
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>