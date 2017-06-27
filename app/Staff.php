<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'nhanvien';

    public function department()
    {
    	return $this->belongsTo('App\Department','ma_phongban','id_pb');
    }
    public function position()
    {
    	return $this->belongsTo('App\Position','ma_chucvu','id_cv');
    }
}
