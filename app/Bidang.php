<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';
	protected $primaryKey = 'id';
    public $incrementing = true;
    
   
    protected $fillable = [
        'nama_bidang', 
    ];

 
    protected $hidden = [

    ];
}
