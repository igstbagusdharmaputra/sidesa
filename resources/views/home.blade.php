@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="mt-3">
        <div class="alert alert-info">Selamat datang {{ Auth::user()->username }}</div>
        <div class="row">
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-user"></i> Peserta</div>
                            <h2>{{ $count['user'] }}</h2>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-book"></i> Soal</div>
                            <h2>{{ $count['soal'] }}</h2>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-pencil-alt"></i> Lomba</div>
                            <h2>
                                <label class="switch">
                                      <input type="checkbox" @if($pengaturan['mulai_lomba'] == 'true') {{ 'checked' }} @endif id="check-lomba">
                                      <span class="slider round"></span>
                                </label>
                            </h2>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('js')
   
@endsection

