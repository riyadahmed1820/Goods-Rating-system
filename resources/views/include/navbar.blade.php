    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

      <div class="container">
        <a class="navbar-brand" href="{{URL::to('/')}}">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
          @if (Auth::guard('web')->user())
          <li class="nav-item active">
        <form action="{{route('searchloc')}}" method="GET" class="search=form">
	<i class="fa fa-search search-icon"></i>
	<input type="text" name="query" id="query" class="search-box" palceholder="search" style="margin-top: 10px;">
        </form>
       
        </li>
          @else
        <li class="nav-item active">
        <form action="{{route('search')}}" method="GET" class="search=form">
	<i class="fa fa-search search-icon"></i>
	<input type="text" name="query" id="query" class="search-box" palceholder="search" style="margin-top: 10px;">
        </form>
        </li>
        @endif
        
        <li class="nav-item active"><a href="{{URL::to('/')}}" class="nav-link">Home</a></li>
        <li class="nav-item active"><a href="{{URL::to('/shop')}}" class="nav-link">shop</a></li>
            <li class="nav-item cta cta-colored"><a href="{{URL::to('/cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{Session::has('cart')?Session::get('cart')->totalQty:0}}]</a></li>

            @if (Auth::guard('web')->user())
            <li class="nav-item active"><a href="{{URL::to('/compare')}}" class="nav-link"><span class="fa fa-user"></span>Compare</a></li>    
            <li class="nav-item active"><a href="{{URL::to('/dashboard')}}" class="nav-link"><span class="fa fa-user"></span>Dashboard</a></li>
                <li class="nav-item active"><a href="{{URL::to('/report')}}" class="nav-link"><span class="fa fa-user"></span>Report</a></li>
                <li class="nav-item active"><a id="logout" class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="fa fa-user"></span>Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            @elseif (Auth::guard('admin')->user())
                <li class="nav-item active"><a href="{{URL::to('/admin')}}" class="nav-link"><span class="fa fa-user"></span>Dashboard</a></li>
                <li class="nav-item active"><a id="logout" class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="fa fa-user"></span>Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            @else
                <li class="nav-item active"><a href="{{URL::to('/client_login')}}" class="nav-link"><span class="fa fa-user"></span>Login</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
