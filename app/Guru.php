<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = ['nama','nips'];
    public $timestamps = true;

    public function Murid()
    {
    	return $this->hasMany('App\Murid','guru_id');
    }
}
