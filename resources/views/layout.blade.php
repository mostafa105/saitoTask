<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Saito Task</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=IBM+Plex+Sans+Arabic:wght@200;300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        @yield('liks')
        {{--  bootstrap & jquery --}}
        <link rel="stylesheet" href='{{asset('css/all.css')}}'>
        <link rel="stylesheet" href='{{asset('css/all.min.css')}}'>
        <link rel="stylesheet" href='{{asset('css/bootstrap.min.css')}}'>
         @yield('style')     <!-- Styles -->
    </head>
    <body class="antialiased" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('customer.create')}}">Customers <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{route('product.create')}}">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('bill.create')}}">Bills</a>
                </li>
              </ul>
            </div>
          </nav>
        @yield('content')

        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        @yield('scripts')
    </body>
</html>
