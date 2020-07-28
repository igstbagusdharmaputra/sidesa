<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'detail_desa';
	protected $primaryKey = 'id_user';
    public $incrementing = false;
    
   
    protected $fillable = [
    	'id_user',
        'nama_desa', 
        'nama_kepala_desa',
        'no_telp'
    ];

 
    protected $hidden = [

    ];
}
