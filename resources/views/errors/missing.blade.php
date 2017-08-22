<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PF') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" >

    {{--fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">

    <style media="screen">
      body{
        align-content: center;
      }
    </style>

  </head>
  <body>
    <div class="row">
        <div class="text-center form-blade large-6 large-offset-3  columns">
            <h1 class="">Page Not Found!</h1>
            <h5 class="">Against the Law of Internet!</h5>
            <hr>
            <a href="/home">Visit HomePage</a></li>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script> $(document).foundation();</script>

  </body>
</html>
