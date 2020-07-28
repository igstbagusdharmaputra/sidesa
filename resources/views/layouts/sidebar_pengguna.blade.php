<!-- header area start -->
<div class="header-area header-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            {{-- <li>
                                <a href="javascript:void(0)"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="submenu">
                                    <li><a href="index.html">ICO dashboard</a></li>
                                    <li><a href="index2.html">Ecommerce dashboard</a></li>
                                    <li><a href="index3.html">SEO dashboard</a></li>
                                </ul>
                            </li> --}}
                            @php($url = 'my-panel')
                            <li @if(Request::is($url)) {{ 'class=active' }} @endif ><a href="{{ route('pengguna.dashboard') }}"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li @if(Request::is($url)) {{ 'class=active' }} @endif ><a href="{{ route('pengguna.dashboard.laporan') }}"><i class="ti-printer"></i> <span>Pelaporan</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- nav and search button -->
            {{-- <div class="col-lg-3 clearfix">
                <div class="search-box">
                    <form action="#">
                        <input type="text" name="search" placeholder="Search..." required>
                        <i class="ti-search"></i>
                    </form>
                </div>
            </div> --}}
            <!-- mobile_menu -->
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>
<!-- header area end -->
