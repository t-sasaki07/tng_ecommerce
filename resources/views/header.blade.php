@yield('header')
<section class="header-top-section">
			<div class="container">
				<div class="row">
					<div  class="col-md-6">
						<div class="header-top-content">
							<ul class="nav nav-pills navbar-left">
								<li><a href="#"><i class="pe-7s-call"></i><span>STORE TOP</span></a></li>
								<li><a href=""><i class="pe-7s-call"></i><span>123-123456789</span></a></li>
								<li><a href=""><i class="pe-7s-mail"></i><span> info@mart.com</span></a></li>
							</ul>
						</div>
					</div>
					<div  class="col-md-6">
						<div class="header-top-menu">
							<ul class="nav nav-pills navbar-right">
								<li><a href='#'>My Account</a></li>
								<li><a href="#">Cart</a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{ url('/home') }}"><i class="pe-7s-lock"></i>Home</a></li>
                                    @else
                                        <li><a href="{{ url('/home') }}"><i class="pe-7s-lock"></i>Login</a></li>

                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}"><i class="pe-7s-lock"></i>Register</a></li>
                                        @endif
                                    @endauth
                                @endif
								<li><a href="#">Manage</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
