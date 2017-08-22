<!-- Scripts -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script> $(document).foundation();</script>

<!-- Include this after the sweet alert js file -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>


<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

@yield('scripts')
