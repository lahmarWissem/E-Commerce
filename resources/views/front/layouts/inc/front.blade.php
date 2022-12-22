<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap5.css')}}">
        <link rel="stylesheet" href="{{ asset('/frontend/css/custom.css')}}">
        <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('/frontend/css/owl.theme.default.min.css')}}">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css')}}" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        <style>
            a{
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body >
    @include('front.layouts.inc.navbar')
     <div class="content">
         
         @yield('content')
        
     </div>
     <div class="mt-5">
    @include('front.layouts.inc.footer')
</div>
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{asset('../../frontend/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('../../frontend/js/jquery-3.6.0.min.js')}}"></script>
     <script src="{{asset('../../frontend/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('../../frontend/js/custom.js')}}"></script>
     <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js')}}"></script>
     <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
     <script src="{{ asset('https://code.jquery.com/ui/1.13.1/jquery-ui.js')}}"></script>
     <script>
          $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
          var availableTags = [];
          $.ajax({
           method:"GET",
           url:"/product-list",
           
           success:function(response){
               //consol.log(response);
                startAutoComplete(response);
            
           }

        });
        function startAutoComplete(availableTags)
        {
            $( "#search" ).autocomplete({
            source: availableTags
          });
        }
         
        
        </script>
     @if (session('status'))
     <script>
       Swal.fire("{{session('status')}}");
     </script>
     
     @endif


     @yield('scripts')
    </body>
</html>