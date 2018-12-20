<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">

                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>

            </li>
            <li class="user-pro">
                <a href="#" class="waves-effect"><img src="../plugins/images/users/varun.jpg" alt="user-img"
                class="img-circle"> <span class="hide-menu"> Steve Gection<span class="fa arrow"></span></span>
            </a>
                <ul class="nav nav-second-level">
                <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li><a href="http://localhost:8000/admin" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
            <span class="hide-menu">Dashboard</span></a></li>
            <li> <a href="" class="waves-effect "><i  class="fa fa-cubes"></i>
            <span class="hide-menu">Products<span class="fa arrow"></span> 
            </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="http://localhost:8000/admin/products">List Products</a></li>
                    <li><a href="http://localhost:8000/admin/products/add">Add products</a></li>
                </ul>
            </li>
            <li> <a href="" class="waves-effect"><i  class="icon-folder-alt"></i>
            <span class="hide-menu">Categories<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="http://localhost:8000/admin/categories">List Categories</a></li>
                    <li><a href="http://localhost:8000/admin/categories/add">Add Categories</a></li>
                </ul>
            </li>
            <li> <a href="http://localhost:8000/admin/orders" class="waves-effect"><i class="icon-drawar"></i>
        <span class="hide-menu">Orders</span></a>
            </li>
            <li class="nav-small-cap">--- Manager</li>
            <li> <a href="" class="waves-effect"><i class="icon-people"></i>
            <span class="hide-menu">Users<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="http://localhost:8000/admin/users">List Users</a></li>
                    <li><a href="http://localhost:8000/admin/users/add">Add Users</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>