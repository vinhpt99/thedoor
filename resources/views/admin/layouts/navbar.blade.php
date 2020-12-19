<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
    <div class="menu-left">
        <a class="navbar-brand" href="/admin">THE DOOR</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
        </button>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/admin/user/{{Auth::user()->id}}">
                    @if(Auth::user())
                        {{Auth::user()->name}}
                    @endif
                </a>
                <div class="dropdown-divider"></div>
                    <a style="margin-left: 15px" href="{{url('logout')}}"><i class="fas fa-sign-out-alt pr-1"></i>Logout</a>
                </div>
        
            </div>
        </li>
    </ul>
</nav>
