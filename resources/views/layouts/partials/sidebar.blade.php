<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('admin/assets/img/dp.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> Kiran Patel</p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item start {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/area') ? 'active' : '' }}">
                    <a href="{{ route('admin.area.index') }}" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                        <span class="title">Area</span> 
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/category') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}" class="nav-link nav-toggle"> <i class="material-icons">apps</i>
                        <span class="title">Category</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="event.html" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                        <span class="title">Event Management</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="event.html" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                        <span class="title">Event Management</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="event.html" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                        <span class="title">Event Management</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="event.html" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                        <span class="title">Event Management</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="event.html" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                        <span class="title">Event Management</span> 
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>