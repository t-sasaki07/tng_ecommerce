@yield('user_menu')
<header class="header-section">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>M</b>art</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('userDetail') }}"><button class="user-btn">My Page</a></li>
                    <li><a href="#">Favorite</a></li>
                    <li><a href="#">Order History</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right cart-menu">
                <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li><a href="#"><span> Cart -$0&nbsp;</span> <span class="shoping-cart">0</span></a></li>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>

