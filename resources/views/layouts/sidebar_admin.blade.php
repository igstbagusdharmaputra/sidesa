<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo" style="font-size: 1.182982em; color:#FFFFFF">
            {{-- {{ $pengaturan['nama_website'] }} --}}
            {{-- <a href="index.html"><img src="{{ asset('images/icon/logo.png') }}" alt="logo"></a> --}}
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    @php($url = 'control-panel')

                    <li @if(Request::is($url)) {{ 'class=active' }} @endif ><a href="{{ route('admin.dashboard') }}"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                    <li @if(Request::is($url.'/Pengguna*')) {{ 'class=active' }} @endif ><a href="{{ route('pengguna.index') }}"><i class="ti-user"></i> <span>Pengguna</span></a>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/pengguna/create')) {{ 'class=active' }} @endif><a href="{{route('pengguna.create')}}">Tambah Pengguna</a></li>
                        </ul>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/pengguna')) {{ 'class=active' }} @endif><a href="{{route('pengguna.index')}}">Daftar Pengguna</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is($url)) {{ 'class=active' }} @endif ><a href="{{ route('bidang.index') }}"><i class="ti-book"></i> <span>Bidang</span></a></li>
                    <li @if(Request::is($url)) {{ 'class=active' }} @endif ><a href="{{ route('dana.index') }}"><i class="ti-money"></i> <span>Sumber Dana</span></a></li>
                    <li @if(Request::is($url)) {{ 'class=active' }} @endif ><a href="{{ route('laporan.keuangan') }}"><i class="ti-printer"></i> <span>Laporan</span></a></li>
                    {{-- <li @if(Request::is('transaksi*')) {{ 'class=active' }} @endif >
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-shopping-cart"></i><span>Transaksi</span></a>
                        <ul class="collapse">
                            <li @if(Request::is('transaksi/penjualan*')) {{ 'class=active' }} @endif><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
                            <li @if(Request::is('transaksi/pembelian*')) {{ 'class=active' }} @endif><a href="{{ route('pembelian.index') }}">Pembelian</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li @if(Request::is('penjualan')) {{ 'class=active' }} @endif><a href="{{ route('penjualan.index') }}"><i class="ti-shopping-cart"></i> <span>Penjualan</span></a></li> --}}
                    {{-- <li><a href="{{ route('home') }}"><i class="ti-package"></i> <span>Pembelian</span></a></li> --}}
                    {{-- <li @if(Request::is('master*')) {{ 'class=active' }} @endif >
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Master Data</span></a>
                        <ul class="collapse">
                            <li @if(Request::is('master/barang*')) {{ 'class=active' }} @endif><a href="{{ route('barang.index') }}">Barang</a></li>
                            <li @if(Request::is('master/pelanggan*')) {{ 'class=active' }} @endif><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                            <li @if(Request::is('master/supplier*')) {{ 'class=active' }} @endif><a href="{{ route('supplier.index') }}">Supplier</a></li>
                            <li @if(Request::is('master/pegawai*')) {{ 'class=active' }} @endif><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
                        </ul>
                    </li> --}}
                    {{-- dipakai --}}
                    {{-- <li @if(Request::is($url.'/soal*')) {{ 'class=active' }} @endif ><a href="{{ route('soal.index') }}"><i class="ti-book"></i> <span>Soal</span></a>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/soal/insert')) {{ 'class=active' }} @endif><a href="{{route('soal.insert')}}">Tambah Soal</a></li>
                        </ul>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/soal')) {{ 'class=active' }} @endif><a href="{{route('soal.index')}}">Daftar Soal</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is($url.'/kategori*')) {{ 'class=active' }} @endif ><a href="{{ route('kategori.index') }}"><i class="ti-bookmark"></i> <span>Kategori Soal</span></a>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/kategori/insert')) {{ 'class=active' }} @endif><a href="{{route('kategori.insert')}}">Tambah Kategori</a></li>
                        </ul>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/kategori')) {{ 'class=active' }} @endif><a href="{{route('kategori.index')}}">Daftar Kategori</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is($url.'/peserta*')) {{ 'class=active' }} @endif ><a href="{{ route('peserta.index') }}"><i class="ti-user"></i> <span>Peserta</span></a>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/peserta/insert')) {{ 'class=active' }} @endif><a href="{{route('peserta.insert')}}">Tambah Peserta</a></li>
                        </ul>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/peserta')) {{ 'class=active' }} @endif><a href="{{route('peserta.index')}}">Daftar Peserta</a></li>
                        </ul>
                    </li>

                    <li @if(Request::is($url.'/nilai*')) {{ 'class=active' }} @endif ><a href="{{ route('nilai.index') }}"><i class="ti-wallet"></i> <span>Nilai</span></a>
                        <ul class="collapse">
                            <li @if(Request::is($url.'/nilai')) {{ 'class=active' }} @endif><a href="{{route('nilai.index')}}">Daftar Nilai</a></li>
                        </ul>
                    </li>

                    <li @if(Request::is($url.'/pengaturan')) {{ 'class=active' }} @endif ><a href="{{ route('pengaturan.index') }}"><i class="ti-settings"></i> <span>Pengaturan Website</span></a></li> --}}
                    {{-- <li @if(Request::is('laporan*')) {{ 'class=active' }} @endif >
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-printer"></i><span>Laporan</span></a>
                        <ul class="collapse">
                            <li @if(Request::is('laporan/penjualan*')) {{ 'class=active' }} @endif><a href="{{ route('laporan.penjualan') }}">Penjualan</a></li>
                            <li @if(Request::is('laporan/pembelian*')) {{ 'class=active' }} @endif><a href="{{ route('laporan.pembelian') }}">Pembelian</a></li>
                        </ul>
                    </li> --}}

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
