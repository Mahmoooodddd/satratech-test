<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotSubPerAdminUser extends Model
{
    public function adminUser()
    {
        return $this->belongsTo('App\AdminUser');
    }

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    public function subPermission()
    {
        return $this->belongsTo('App\SubPermission');
    }
}
