<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPermission extends Model
{
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    public function pivotSubPerAdminUsers()
    {
        return $this->hasMany('App\pivotSubPerAdminUser');
    }
}
