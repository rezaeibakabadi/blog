<!doctype html>
<html lang="en">




<head class="head">
    @include('partials._head')
</head>




<body>

<div class="container">

@include('partials._nav')


    @include('partials._messages')



    @yield('content')
    @include('partials._footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

@include('partials._javascript')

@yield('scripts')

</div>
</body>


</html>