

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
        <x-app-layout>
        <div class="container-fluid py-5">
            <h1 class="py-2"><b>Overview</b></h1>
            <div class="row">
        
              <div class="col-xl-6 col-sm-6  mb-5 ">
                <div class="card text-light bg-dark ">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Sales</p>
                          <h3 class="font-weight-bolder mb-0">
                          <b>{{$money}} Dt</b>
                          </h3>
                        </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="fa fa-money shadow text-center border-radius-md">
                          <i class="fa-solid fa-circle-check" aria-hidden="true" style="font-size:20px; ">paid</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card text-light bg-dark">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">Registred Users</p>
                          <h3 class="font-weight-bolder mb-0">
                          <b>{{$usercount}} Users</b>
                          </h3>
                        </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="fa fa-user bg-gradient-primary shadow text-center border-radius-md">
                          <i class="material-icons" aria-hidden="true" style="font-size:20px; ">person</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card  bg-danger">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">New Orders</p>
                          <h3 class="font-weight-bolder mb-0">
                            <b> {{$orders}} Order </b>
        
                          </h3>
                        </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="fa fa-list bg-gradient-primary shadow text-center border-radius-md">
                          <i class="material-icons" aria-hidden="true" style="font-size:20px; ">reorder</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-warning">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Products</p>
                          <h3 class="font-weight-bolder mb-0">
                            <b>{{$product}}  Product </b>
        
                          </h3>
                        </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="fa fa-cubes bg-gradient-primary shadow text-center border-radius-md">
                          <i class="material-icons" aria-hidden="true" style="font-size:20px; ">category</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-success">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">Out of Stock</p>
                          <h3 class="font-weight-bolder mb-0">
                            <b> {{$outstock}} Product </b>
        
                          </h3>
                        </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="fa fa-check bg-gradient-primary shadow text-center border-radius-md">
                          <i class="material-icons" aria-hidden="true" style="font-size:20px; ">close</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-6 ">
                <div class="card bg-info">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">In Stock</p>
                          <h3 class="font-weight-bolder mb-0">
                            <b>{{$stock}}  Product </b>
        
                          </h3>
                        </div>
                      </div>
                      <div class="col-4 text-end ">
                        <div class="fa fa-check bg-gradient-primary shadow text-center border-radius-md">
                          <i class="material-icons" aria-hidden="true" style="font-size:20px; ">done</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
            </div>
        </x-app-layout>
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

  

    



