<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = 'phongban';
    public function staff()
    {
    	return $this->hasMany('App\Staff','id_pb','ma_phongban');
    }
}
