@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('bidang.index') }}">Bidang Desa</a></li>
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
                    <form action="{{ route('bidang.update',[$item->id]) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label">Nama Bidang Desa</label>
                            <input type="text" class="form-control" name="nama_bidang" value="{{ empty(old('nama_bidang')) ? $item->nama_bidang : old('nama_bidang') }}">
                            @if ($errors->has('nama_bidang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_bidang') }}</strong>
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
