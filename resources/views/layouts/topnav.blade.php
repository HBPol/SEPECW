<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbars_01">
        	<ul class="navbar-nav mr-auto">
        		<li class="nav-item active"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        		@role('Staff')
                	<li><a class="btn btn-outline-secondary ml-2 my-2 my-sm-0" href="{{ route('news.create') }}">New Article</a></li>
                @endrole
                @role('Admin')
                	<li><a class="btn btn-outline-danger ml-2 my-2 my-sm-0" href="{{ route('users.index') }}">Users</a></li>
                @endrole
        		<!-- <li class="nav-item"><a class="nav-link" href="#">Drawings</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sculpture</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Photography</a></li>  -->				
        	</ul>
        	
        	<form class="form-inline my-2 my-lg-0" action="">
        		<input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
        		<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        	</form>
                		
						@guest
						
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary ml-2 my-2 my-sm-0"><i class="fas fa-sign-in-alt"></i>{{ __('Login') }}</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary ml-2 my-2 my-sm-0">{{ __('Register') }}</a>

                        @else
    						<ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle ml-2 my-2 my-sm-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                	<i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    								
    								<a class="dropdown-item" href="#"><i class="fas fa-cog"></i>&nbsp;Settings</a>
    								@role('Admin') {{-- Laravel-permission blade helper --}}
                                        <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fa fa-btn fa-unlock"></i>&nbsp;Admin</a>
									@endrole
    								<a class="dropdown-item" href="#">Another item</a>
    								<div class="dropdown-divider"></div>
    								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Logout') }}</a>
    								
                                </div>
    						</li>
    						
    						</ul>
    						
    						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
    						</form>
                               
                        @endguest
            
        </div>
    </div>
</nav>