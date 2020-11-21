<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    public function pivotSubPerAdminUsers()
    {
        return $this->hasMany('App\pivotSubPerAdminUser');
    }
}
