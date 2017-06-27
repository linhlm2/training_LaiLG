<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table = 'chucvu';

    public function staff()
    {
    	return $this->hasMany('App\Staff','id_cv','ma_chucvu');
    }
}
