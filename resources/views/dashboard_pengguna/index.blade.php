@extends('layouts.app')

@section('css')
	<style>
		hr{
			margin-top: 5px;
		}
	</style>
@endsection

@section('content')
	{{-- <div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-body">
						<h5>Nama</h5>
						<p>{{ $item->nama }}</p>
						<hr>
                        <h5>Username</h5>
                        <p>{{ $item->username }}</p>
                        <hr>
						<h5>Jenis Kelamin</h5>
						<p>{{ ucfirst($item->jenis_kelamin) }}</p>
						<hr>
						<h5>Status Lomba</h5>
						<p>
                            <div style="width: 120px;overflow-x: hidden;">
                                <marquee behavior="" direction="">
                                    @if($status == true)
                                        @if($pengaturan['mulai_lomba'] == 'false')
                                            {!! '<span style="color: red">Belum dimulai</span>' !!}
                                        @else
                                            {!! '<span style="color: green">Sudah dimulai</span>' !!}
                                        @endif
                                    @else
                                        {!! '<span style="color: orange">Telah berakhir</span>' !!}
                                    @endif
                                </marquee>
                            </div>
                        </p>
						<hr>
						<h5>Alokasi Waktu</h5>
						<p>{{ $pengaturan['lama_lomba'] }} menit</p>
						<hr>
                        @if($btn == true)
                            <div style="text-align: center">
                                <button class="btn btn-primary btn-rounded" id="btn-mulai"><i class="ti-control-play" id="loading-icon"></i> Mulai Lomba</button>
                            </div>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div> --}}
@endsection

