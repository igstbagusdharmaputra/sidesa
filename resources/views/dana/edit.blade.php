@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('dana.index') }}">Sumber Dana Desa</a></li>
                <li><span>Edit</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dana.update',[$item->id]) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label">Nama Bidang Desa</label>
                            <input type="text" class="form-control" name="nama_dana" value="{{ empty(old('nama_dana')) ? $item->nama_dana : old('nama_dana') }}">
                            @if ($errors->has('nama_dana'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_dana') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prefix</label>
                            <input type="text" class="form-control" name="prefix" value="{{ empty(old('prefix')) ? $item->prefix : old('prefix') }}">
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
                            <button type="submit" class="btn btn-warning">Edit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>    
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
