<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part">
            <a class="logo" href="index.html">
        <b><img src="../plugins/images/pixeladmin-logo.png"
                alt="home" /></b>
        <span class="hidden-xs"><img src="../plugins/images/pixeladmin-text.png"
                alt="home" /></span> </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs active">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="ti-menu icon-arrow-left-circle"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/varun.jpg"
                alt="user-img" width="36" class="img-circle"><b class="hidden-xs">admin@admin.com</b> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>