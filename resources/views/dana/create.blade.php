@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('dana.index') }}">Sumber Dana Desa</a></li>
                <li><span>Tambah</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dana.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Nama Sumber Dana</label>
                            <input type="text" name="nama_dana" class="form-control" value="{{old('nama_dana')}}">
                            @if ($errors->has('nama_dana'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_dana') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Kode Sumber Dana</label>
                            <input type="text" name="prefix" class="form-control" value="{{old('prefix')}}">
                            <small>contoh Kode Sumber Dana: PAD, ADD, PBH</small>
                            @if ($errors->has('prefix'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prefix') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
                    <div class="card-footer">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn btn-danger" id="btnReset">Reset</button>
                        </div>    
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#btnReset').click(function(){
                btnFoto('remove')
            });
        });
    </script>
@endsection
