@yield('header')
<section class="header-top-section">
    <div class="container">
        <div class="row">
            <div  class="col-md-6">
                <div class="header-top-content">
                    <ul class="nav nav-pills navbar-left">
                        <li><a href="{{ url('/') }}"><i class="pe-7s-call"></i><span>STORE TOP</span></a></li>
                        <li><a href=""><i class="fas fa-phone"></i><span>123-123456789</span></a></li>
                        <li><a href=""><i class="pe-7s-mail"></i><span> info@mart.com</span></a></li>
                    </ul>
                </div>
            </div>
            <div  class="col-md-6">
                <div class="header-top-menu">
                    <ul class="nav nav-pills navbar-right">
                        @if(Auth::guard('user')->check())
                            <li><a href="{{ route('mypage') }}">My Page</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="{{ route('userLogout') }}">Logout</a></li>
                        @endif
                        @guest
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li><a href="{{ route('user.login') }}"><i class="pe-7s-lock"></i>Login</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('user.register') }}"><i class="pe-7s-lock"></i>Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        @endguest
                        {{--  管理者ログイン登録をどう遷移させるか  --}}
                        <li><a href="#">Manage</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
