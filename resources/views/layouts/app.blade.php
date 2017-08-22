<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('layouts._header')
</head>

<body>
  <div class="container">
    @include('layouts._nav')

    @yield('content')
  </div>

  @include('layouts._footer')

</body>
</html>
