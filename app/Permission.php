<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function adminUsers()
    {
        return $this->belongsToMany('App\AdminUser');
    }

    public function subPermissions()
    {
        return $this->hasMany('App\SubPermission');
    }

    public function pivotSubPerAdminUsers()
    {
        return $this->hasMany('App\pivotSubPerAdminUser');
    }
}
