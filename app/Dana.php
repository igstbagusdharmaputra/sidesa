<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    protected $table = 'sumber_dana';
	protected $primaryKey = 'id';
    public $incrementing = true;
    
   
    protected $fillable = [
        'nama_dana', 
        'prefix'
    ];

 
    protected $hidden = [

    ];
}
