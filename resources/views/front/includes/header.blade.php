<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ @url('/') }}">Mage2</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{!! @url('/') !!}" title="Entity">Home</a></li>

                {!! Category::renderCategoryTree($categoryTree) !!}

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="{!! url('/cart/') !!}" title="Cart">Cart ({!! count(Session::get('cart')) !!})</a></li>
                <?php if(!app('front.auth')->check()): ?>
                <li><a href="{!! url('/login') !!}">Login</a></li>
                <li><a href="{!! url('/register') !!}">Register</a></li>

                <?php else: ?>
                    <li role="presentation" class="dropdown">
                        <a href="{!! url('/customer/account') !!}" title="My Account" class="dropdown-toggle"
                           data-toggle="dropdown">
                            My Account <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{!! url('/customer/account') !!}" title="My Account">My Account</a></li>
                            <li><a href="{!! url('/customer/settings') !!}">Settings</a></li>
                            <li><a href="{!! url('/logout') !!}">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>