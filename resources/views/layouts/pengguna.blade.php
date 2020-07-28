<!-- main wrapper start -->
<div class="horizontal-main-wrapper">
    <!-- main header area start -->
    <div class="mainheader-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        {{-- {{ $pengaturan['nama_website'] }} --}}
                    </div>
                </div>
                <!-- profile info & task notification -->
                <div class="col-md-9 clearfix text-right">
                    <div class="clearfix d-md-inline-block d-block">
                        <div class="user-profile m-0">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('pengguna.dashboard.profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header area end -->
    @include('layouts.sidebar_pengguna')
    <!-- page title area end -->
    <div class="main-content-inner">
        @if (session('status'))
            {!! session('status') !!}
        @endif
        @yield('content')
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    @include('layouts.footer')
    <!-- footer area end-->
</div>
<!-- main wrapper start
