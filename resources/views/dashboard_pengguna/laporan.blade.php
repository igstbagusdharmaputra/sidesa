@extends('layouts.app')

@section('css')
	<style>
		hr{
			margin-top: 5px;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" name="prefix" class="form-control" value="{{old('prefix')}}">
                                @if ($errors->has('prefix'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefix') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Waktu Pelaksanaan</label>
                                <input type="text" name="prefix" class="form-control" value="{{old('prefix')}}">
                                @if ($errors->has('prefix'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefix') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Sumber Dana</label>
                                <input type="text" name="prefix" class="form-control" value="{{old('prefix')}}">
                                @if ($errors->has('prefix'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefix') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Output/Keluaran</label>
                                <input type="text" name="prefix" class="form-control" value="{{old('prefix')}}">
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
	</div>
@endsection

