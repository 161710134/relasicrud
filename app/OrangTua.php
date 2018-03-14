<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tuas';
    protected $fillable = ['nama','murid_id'];
    public $timestamps = true;

    public function Murid()
	{
		return $this->belongsTo('App\Murid','murid_id');
	}
}
