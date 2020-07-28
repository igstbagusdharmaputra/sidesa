@extends('layouts.app')

@section('breadcrumbs')
	<div class="col-sm-6">
		<div class="breadcrumbs-area clearfix">
			<h4 class="page-title pull-left">{{$title}}</h4>
			<ul class="breadcrumbs pull-left">
				<li><a href="{{ route('admin.dashboard') }}">Home</a></li>
				<li><span>Sumber Dana Desa</span></li>
			</ul>
		</div>
	</div>
@endsection

@section('css')
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.jqueryui.min.css') }}">

@endsection

@section('content') 
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">
						Daftar Sumber Dana
						<a href="{{ route('dana.create') }}" style="margin-left: 10px" class="btn btn-primary btn-xs"><i class="ti-plus"></i> Tambah</a>
					</h4>
					<div class="data-tables">
						<table id="dataTable" class="text-center">
							<thead class="bg-light text-capitalize">
								<tr>
									<td>No</td>
									<td>Sumber Dana Desa</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- Start datatable js -->
	<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>

	<script>
		$(document).ready(function(){
			$('#dataTable').DataTable({
				responsive: false,
				ajax: "{{ route('dana.showdata') }}",
				columns: [
					{data: 'num'},
					{data: 'nama_dana'},
					{data: 'action', orderable: false}
				],
			});
			$(document).on('click', '.btn-delete', function (e) {
				var id = $(this).attr('data-id');

				e.preventDefault();
				swal({
				  title: "Apakah anda yakin ingin melanjutkan?",
				  text: "Anda tidak bisa mengembalikan data yang telah terhapus!",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Ya, hapus!",
				  cancelButtonText: 'Tidak',
				  closeOnConfirm: true,
				  html: false
				}, function(data){
					if(data){
						$('#form-delete-'+id).submit();
					}
				});
			});
			
		})
		

	</script>
@endsection
