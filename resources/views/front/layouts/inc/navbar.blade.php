<meta name="csrf-token" content="{{ csrf_token() }}">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">

    <div class="container">
    <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-globe"></i> Shopy</a>
    <div class="search-bar">
      <form action="{{url('searchproduct')}}" method="POST">
        {{csrf_field()}}
      <div class="input-group me-3 ">
        <input type="search" class="form-control"id="search" name="product_name" placeholder="Product Name"  aria-describedby="basic-addon1">
        <button type="submit" class="input-group-text" ><i class="fa fa-search"></i></button>
      </div>
    </form>
    </div>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item ">
          <a class="nav-link" href="{{url('/')}}"> <i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{url('category')}}"><i class="fa fa-cubes"></i> Category</a>
        </li>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{url('cartview')}}"> <i class="fa fa-cart-plus"></i> Cart
        <span class="badge badge-pill bg-danger cart-count">0</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{url('wishlist')}}"> <i class="fa fa-heart"></i> Wishlist
          <span class="badge badge-pill bg-danger wishlist-count">0</span></a>
        </a>
      </li>
        @guest
        @if (Route::has('login'))
       
            @auth('front')
            <li class="nav-item">
              <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"></a>
            </li>
               
            @else
            <li class="nav-item">
         
              <a class="nav-link " href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
            </li>

                @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link " href="{{route('register')}}"><i class="fa fa-user"></i> Register</a>
                </li>
                @endif
            @endauth
       
       @endif
        <div class="hidden sm:flex sm:items-center sm:ml-2">
          @auth('front')
          <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                 
                <button class="flex items-center  font-medium text-gray-500  hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                  
                   <b style="color:rgba(255,255,255,.55)"> <div>{{ Auth::guard('front')->user()->name }}</div></b>
                
                     

                      <div class="ml-1">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                      </div>
                  </button>
              </x-slot>
                 
              
              <x-slot name="content">
                  <!-- Authentication -->
                  
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                     
                        <x-dropdown-link 
                         href="{{url('ordersview')}}">
                        <span style="color:rgb(61, 61, 63)">My Orders</span>
                      </x-dropdown-link>

                     
                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
                  
              </x-slot>
              @endauth
          </x-dropdown>
      </div>
    
        @endguest
      
       
     
      </ul>
    </div>
</div>
  </nav>



    
 
  