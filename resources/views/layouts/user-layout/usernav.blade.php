<div class="container-fluid">
        <div class="row border-top px-xl-5">
            
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            @if (is_null(Auth::user()))
                                <a href="/" class="nav-item nav-link">Home</a>   
                            @else
                                <a href="/home" class="nav-item nav-link">Home</a>   
                            @endif
                                                                           
                        </div>
                        @guest
                            <div class="navbar-nav ml-auto py-0">
                                <a href="/login" class="nav-item nav-link">Login</a>                                                          
                            @if (Route::has('register'))                                                    
                                    <a href="{{ route('register') }}" class="nav-item nav-link">{{ __('Register') }}</a>
                                </div>
                            @endif
                        @else
                            <div class="navbar-nav ml-auto py-0">
                                <a href="/profile" class="nav-item nav-link">Profile</a>                              
                                <a href="{{ route('logout') }}" class="nav-item nav-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    
                                    {{ __('Logout') }}</a>
                                    
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    </div>