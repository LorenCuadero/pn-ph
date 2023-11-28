<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src=""
                    class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ \Auth::user()->username }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="" class="img-circle elevation-2"
                        alt="User Image">
                    <p>
                        {{ \Auth::user()->username }}
                        <small>Member since August 12, 2023</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">{{ __('words.Profile') }}</a>
                    <a href="#" class="btn btn-default btn-flat float-right">
                        {{ __('words.SignOut') }}
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
