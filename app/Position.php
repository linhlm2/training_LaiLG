<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';
    public $timestamps = false;

    public function staff()
    {
    	return $this->hasMany('App\Staff','id','id_position');
    }
}
