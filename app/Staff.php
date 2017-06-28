<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    public function department()
    {
    	return $this->belongsTo('App\Department','id_department','id');
    }
    public function position()
    {
    	return $this->belongsTo('App\Position','id_position','id');
    }
}
