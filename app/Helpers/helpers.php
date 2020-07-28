<?php
use \Carbon\Carbon as Carbon;
if(!function_exists('dateDiff')){
	function dateDiff($date){
		// $created = new Carbon($date, 'Asia/Makassar');
		// $now = Carbon::now();
		$a = Carbon::createFromTimeStamp(strtotime($date));

		// $difference = ($created->diff($now)->days < 1) ? 'Today' : $created->diffForHumans($now);
		if ($a->diffInDays() > 14) 
			return $date;
		else 
			if ($a->diffInDays() == 0) 
				return 'Today'; 
			else return $a->diffForHumans();
	}
}

if(!function_exists('indonesianDate')){
	function indonesianDate($date){
		$month = '';
		$day   = '';
		switch (date('m', strtotime($date))) {
			case 1:
				$month = 'Januari';
				break;

			case 2;
				$month = 'Februari';
				break;

			
			default:
				# code...
				break;
		}
	}
}

if(!function_exists('urlGenerate')){
	function urlGenerate(){
	  	return url('/');
	}
}


if(!function_exists('msg')){
	function msg($msg, $type = 'info', $class = 'mt-5'){
		return '
			<div class="'.$class.' alert alert-'.$type.' alert-dismissible fade show" role="alert">'.
				$msg.
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
				'<span aria-hidden="true">&times;</span>'.
			'</div>';
	}
}

if(!function_exists('addLabel')){
	function addLabel($value, $color = 'info'){
		return '<label class="badge badge-'.$color.'">'.$value.'</label>';
	}
}

if(!function_exists('autoNumber')){
	function autoNumber($table, $primary, $prefix, $size = 5){
		date_default_timezone_set('Asia/Makassar');
		$q= DB::table($table)
				->select(DB::raw('MAX(RIGHT('.$primary.','.$size.')) as kd_max'));

		// dd($q);
		// $prx=$prefix.date('ymd');
		$prx = $prefix;
		if($q->count()>0){
			$k = $q->first();

			// dd($k);

			$tmp = ((int)$k->kd_max)+1;
			$kd = $prx.sprintf("%0".$size."s", $tmp);
		}else{
			$nol = "";
			for ($i=1; $i < $size; $i++) { 
				$nol .= "0";
			}
			$kd = $prefix.$nol."1";
		}

		return $kd;
	}
}

if(!function_exists('autoNumberSoal')){
	function autoNumberSoal($id, $prefix){
		$primary = 'id';
		$table = 'soal';
		$size = 3;

		$q= DB::table($table)
				->select(DB::raw('MAX(RIGHT('.$primary.','.$size.')) as kd_max'))
				->where('id_kategori', '=', $id);
		// dd($q);
		// $prx=$prefix.date('ymd');
		$prx = $prefix;
		if($q->count()>0){
			$k = $q->first();

			// dd($k);

			$tmp = ((int)$k->kd_max)+1;
			$kd = $prx.sprintf("%0".$size."s", $tmp);
		}else{
			$nol = "";
			for ($i=1; $i < $size; $i++) { 
				$nol .= "0";
			}
			$kd = $prefix.$nol."1";
		}

		return $kd;
	}
}

if(!function_exists('getKunci')){
	function getKunci(){
		return [
			'a' => 'A',
			'b'  => 'B',
			'c'  => 'C',
			'd' => 'D',
			'e' => 'E',
		];
	}
}

if(!function_exists('getKelamin')){
	function getKelamin(){
		return [
			'laki-laki' => 'Laki-laki',
			'perempuan'  => 'Perempuan',
		];
	}
}


if(!function_exists('getStatus')){
	function getStatus(){
		return [
			1 => 'Aktif',
			0 => 'Nonaktif'
		];
	}
}

if(!function_exists('searchJumlahSoalByIdKategori')){
	function searchJumlahSoalByIdKategori($arr, $search){
		foreach ($arr as $value) {
			if($value->id == $search)
				return $value->jumlah_soal;
		}

		return 0;
	}
}

