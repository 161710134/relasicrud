<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murids';
     protected $fillable = ['nama','nik','guru_id'];
     public $timestamps = true;

	public function Guru()
	{
		return $this->belongsTo('App\Guru','guru_id');
	}

    public function OrangTua()
    {
    	return $this->hasOne('App\OrangTua','murid_id');
    }
}
