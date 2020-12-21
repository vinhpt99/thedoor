<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link mt-2" href="/" target="_blank">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Xem trang
            </a>
            <div class="sb-sidenav-menu-heading">Thành phần trang</div>
            <!-- Slide -->
            @if(Auth::user()->type ==1)
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                Slide
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('admin/slide')}}">Danh sách</a>
                    <a class="nav-link" href="{{url('admin/slide/create')}}">Thêm mới</a>
                </nav>
            </div>
            <!-- Slide -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#theme" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Giao diện
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="theme" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('admin/layout')}}">Danh sách</a>
                    <a class="nav-link" href="{{url('admin/layout/create')}}">Thêm mới</a>
                </nav>
            </div>
            @endif
            <!-- Slide -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                Blog
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="blog" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('admin/blog')}}">Danh sách</a>
                    <a class="nav-link" href="{{url('admin/blog/create')}}">Thêm mới</a>
                    @if (Auth::user()->type ==1)
                    <a class="nav-link" href="{{url('admin/blog/status')}}">Đang xử lý (
                            @if(isset($blogs))
                               {{count($blogs)}}
                            @endif
                    )</a>
                    @endif
                  
                </nav>
            </div>
            @if (Auth::user()->type ==1)
            <!-- Bo phan -->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dept" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                        Bộ phận
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dept" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('admin/dept')}}">Danh sách</a>
                            <a class="nav-link" href="{{url('admin/dept/create')}}">Thêm mới</a>
                        </nav>
                    </div>
                    <!-- Nhan vien -->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mem" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Nhân viên
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="mem" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('admin/staff')}}">Danh sách</a>
                            <a class="nav-link" href="{{url('admin/user/create')}}">Thêm mới</a>
                        </nav>
                    </div>
                    {{-- Dich vu--}}
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ser" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-code-branch"></i></div>
                        Dịch vụ
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="ser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('admin/service')}}">Danh sách</a>
                            <a class="nav-link" href="{{url('admin/service/create')}}">Thêm mới</a>
                        </nav>
                    </div>
                    {{-- Khach hang--}}
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cus" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fab fa-intercom"></i></div>
                        Khách hàng
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="cus" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('admin/customer')}}">Danh sách</a>
                            <a class="nav-link" href="{{url('admin/customer/create')}}">Thêm mới</a>
                        </nav>
                    </div>
                    {{-- San pham--}}
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fab fa-accusoft"></i></div>
                        Sản phẩm
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="{{url('admin/product')}}">
                                Danh sách
                            </a>
                            <a class="nav-link collapsed" href="{{url('admin/product/create')}}">
                                Thêm mới
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError"
                                aria-expanded="false" aria-controls="pagesCollapseError">
                                Chi tiết sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('admin/detail')}}">Danh sách</a>
                                    <a class="nav-link" href="{{url('admin/detail/create')}}">Thêm bài viết</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    {{-- User--}}
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="false"
                        aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                        Tài khoản
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="user" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="{{url('admin/user')}}">
                                Danh sách
                            </a>
                            <a class="nav-link collapsed" href="{{url('admin/user/create')}}">
                                Thêm mới
                            </a>
                        </nav>
                    </div>
            @endif
            {{-- Yêu cầu--}}
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#request" aria-expanded="false"
                aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-file-contract"></i></div>
                Yêu cầu
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="request" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('admin/hire_page')}}">Liên hệ</a>
                    @if (Auth::user()->type ==1)
                    <a class="nav-link" href="{{url('admin/candidate')}}">Trở thành cộng sự</a>
                    @endif
                    
                    <a class="nav-link" href="{{url('admin/feed_back')}}">Phản hồi</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small text-center">&copy;The Door</div>
    </div>
</nav>